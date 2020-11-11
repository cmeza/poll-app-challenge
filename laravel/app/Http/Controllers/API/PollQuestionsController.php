<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PollQuestionCreateRequest;
use App\Http\Requests\PollQuestionStoreRequest;
use App\Models\PollQuestion;
use App\Http\Resources\PollQuestionResource;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

class PollQuestionsController extends Controller
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
        $questions =  PollQuestion::all();
        $questions->load(['poll']);

        return PollQuestionResource::collection($questions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PollQuestionStoreRequest $request)
    {
        $validData = $request->validated();

        $question = new PollQuestion();

        $question->poll_id = (int) $validData['poll_id'];
        $question->question = $validData['question'];
//        $question->is_int = ($validData['is_int'] === 'true' || $validData['is_int'] === 1);
        $question->is_int = (int) $validData['is_int'];

        $question->save();

        return (new PollQuestionResource($question))
            ->response()
            ->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PollQuestion  $pollQuestions
     * @return \Illuminate\Http\Response
     */
    public function show(PollQuestion $pollQuestions)
    {
        $pollQuestions->load(['poll', 'result']);

        return new PollQuestionResource($pollQuestions);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PollQuestionCreateRequest $request
     * @param \App\Models\PollQuestion $pollQuestions
     * @return \Illuminate\Http\Response
     */
    public function update(PollQuestionCreateRequest $request, PollQuestion $pollQuestions)
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
     * @param  \App\Models\PollQuestion  $pollQuestions
     * @return \Illuminate\Http\Response
     */
    public function destroy(PollQuestion $pollQuestions)
    {
        $this->canUser('delete');

        $pollQuestions->delete();

        return response()->json(null, 204);
    }
}
