<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PollResultRequest;
use App\Http\Resources\PollResultResource;
use App\Models\PollQuestion;
use App\Models\PollResult;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class PollResultsController extends Controller
{
    /**
     * PollResultsController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:api')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
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
     * @param PollResultRequest $request
     * @return JsonResponse|Response|object
     */
    public function store(PollResultRequest $request)
    {
        // TODO validate unique based on index
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
           return $this->update($request, $pollResult);
        }

        return (new PollResultResource($pollResult))
            ->response()
            ->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     *
     * @param PollResult $pollResults
     * @return PollResultResource|Response
     */
    public function show(PollResult $pollResults)
    {
        $pollResults->load(['poll', 'question']);

        return new PollResultResource($pollResults);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PollResultRequest $request
     * @param PollResult $pollResults
     * @return JsonResponse|Response|object
     */
    public function update(PollResultRequest $request, PollResult $pollResults)
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
     * @param PollResult $pollResults
     * @return JsonResponse|Response
     * @throws \Exception
     */
    public function destroy(PollResult $pollResults)
    {
        $this->canUser('update');

        $pollResults->delete();

        return response()->json(null, 204);
    }
}
