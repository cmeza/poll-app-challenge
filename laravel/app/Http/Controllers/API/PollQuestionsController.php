<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PollQuestionCreateRequest;
use App\Http\Requests\PollQuestionRequest;
use App\Models\PollQuestion;
use App\Http\Resources\PollQuestionResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

class PollQuestionsController extends Controller
{
    /**
     * PollQuestionsController constructor.
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
        $questions =  PollQuestion::all();
        $questions->load(['poll']);

        return PollQuestionResource::collection($questions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PollQuestionRequest $request
     * @return JsonResponse|Response|object
     */
    public function store(PollQuestionRequest $request)
    {
        $validData = $request->validated();

        $question = new PollQuestion();

        $question->poll_id = (int) $validData['poll_id'];
        $question->question = $validData['question'];
        $question->is_int = (int) $validData['is_int'];

        $question->save();

        return (new PollQuestionResource($question))
            ->response()
            ->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     *
     * @param PollQuestion $pollQuestions
     * @return PollQuestionResource
     */
    public function show(PollQuestion $pollQuestions)
    {
        $pollQuestions->load(['poll', 'result']);

        return new PollQuestionResource($pollQuestions);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PollQuestionRequest $request
     * @param PollQuestion $pollQuestions
     * @return JsonResponse|Response|object
     */
    public function update(PollQuestionRequest $request, PollQuestion $pollQuestions)
    {
        $validData = $request->validated();

        $pollQuestions->poll_id = (int) $validData['poll_id'];
        $pollQuestions->question = $validData['question'];
        $pollQuestions->is_int = (bool) $validData['is_int'];

        $pollQuestions->save();

        return (new PollQuestionResource($pollQuestions))
            ->response()
            ->setStatusCode(200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param PollQuestion $pollQuestions
     * @return JsonResponse|Response
     * @throws \Exception
     */
    public function destroy(PollQuestion $pollQuestions)
    {
        $this->canUser('delete');

        $pollQuestions->delete();

        return response()->json(null, 204);
    }
}
