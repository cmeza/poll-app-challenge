<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PollResultCreateRequest;
use App\Http\Requests\PollResultStoreRequest;
use App\Http\Resources\PollResultResource;
use App\Models\PollQuestion;
use App\Models\PollResult;
use Illuminate\Http\Request;

class PollResultsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = PollResult::all();
        $results->load(['poll', 'question']);

        return PollResultResource::collection($results);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PollResultCreateRequest $request)
    {
        // validate unique based on index
        $validData = $request->validated();

        $questionIsInt = PollQuestion::findOrFail((int) $validData['poll_question_id'])->is_int;

        $where = [
            'poll_id' => (int) $validData['poll_id'],
            'poll_question_id' => (int) $validData['poll_question_id'],
        ];

        $newValues = [
            'value' => ($questionIsInt) ? (int) $validData['value'] : $validData['value'],
            'created_at' => date('Y-m-d H:i:s')
        ];

        $pollResult = PollResult::firstOrCreate($where, $newValues);

        if (! $pollResult->wasRecentlyCreated) {
            $this->update($request, $pollResult);
        }

        return (new PollResultResource($pollResult))
            ->response()
            ->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PollResult  $pollResults
     * @return \Illuminate\Http\Response
     */
    public function show(PollResult $pollResults)
    {
        $pollResults->load(['poll', 'question']);

        return new PollResultResource($pollResults);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PollResult  $pollResults
     * @return \Illuminate\Http\Response
     */
    public function update(PollResultStoreRequest $request, PollResult $pollResults)
    {
        $validData = $request->validated();

        if ($pollResults->question->is_int) {
            if ((int) $validData['value'] <= 0) {
                (int) $pollResults->value--;
            } else {
                (int) $pollResults->value++;
            }
        } else {
            $pollResults->value = $validData['value'];
        }

        $pollResults->poll_id = $validData['poll_id'];
        $pollResults->poll_question_id = $validData['poll_question_id'];

        $pollResults->save();

        return (new PollResultResource($pollResults))
            ->response()
            ->setStatusCode(200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PollResult  $pollResults
     * @return \Illuminate\Http\Response
     */
    public function destroy(PollResult $pollResults)
    {
        $this->canUser('update');

        $pollResults->delete();

        return response()->json(null, 204);
    }
}
