<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PollRequest;
use App\Http\Resources\PollResource;
use App\Models\Poll;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class PollsController extends Controller
{
    /**
     * PollsController constructor.
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
        return PollResource::collection(Poll::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PollRequest $request
     * @return JsonResponse|Response|object
     */
    public function store(PollRequest $request)
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
     * @param Poll $poll
     * @return PollResource
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
     * @param PollRequest $request
     * @param Poll $poll
     * @return JsonResponse|Response|object
     */
    public function update(PollRequest $request, Poll $poll)
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
     * @param Poll $poll
     * @return JsonResponse|Response
     * @throws \Exception
     */
    public function destroy(Poll $poll)
    {
        $this->canUser('delete');

        $poll->delete();

        return response()->json(null, 204);
    }
}
