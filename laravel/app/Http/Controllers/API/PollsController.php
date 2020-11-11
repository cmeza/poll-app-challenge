<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PollStoreRequest;
use App\Http\Requests\PollUpdateRequest;
use App\Http\Resources\PollResource;
use App\Models\Poll;
use Illuminate\Http\Response;

class PollsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return PollResource::collection(Poll::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(PollStoreRequest $request)
    {
        $validData = $request->validated();

        $poll = new Poll();

        $poll->title = $validData['title'];
        $poll->poll_type_id = (int) $validData['poll_type_id'];

        $poll->save();

        return (new PollResource($poll))
            ->response()
            ->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Poll  $poll
     * @return Response
     */
    public function show(Poll $poll)
    {
        $poll->load([
            'pollType',
            'questions.result',
            'questions' => function($questions) {
                $questions->orderBy('question');
            }
        ]);

        return new PollResource($poll);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PollStoreRequest $request
     * @param \App\Models\Poll $poll
     * @return Response
     */
    public function update(PollUpdateRequest $request, Poll $poll)
    {
        $validData = $request->validated();

        $poll->title = $validData['title'];
        $poll->poll_type_id = (int) $validData['poll_type_id'];

        $poll->save();

        return (new PollResource($poll))
            ->response()
            ->setStatusCode(200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Poll  $poll
     * @return Response
     */
    public function destroy(Poll $poll)
    {
        $this->canUser('delete');

        $poll->delete();

        return response()->json(null, 204);
    }
}
