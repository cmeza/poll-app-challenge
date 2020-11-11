<?php

namespace App\Http\Controllers;

use App\Http\Resources\PollQuestionResource as PollQuestionResource;
use App\Models\PollQuestion;
use Illuminate\Http\Request;

class PollQuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PollQuestion  $pollQuestions
     * @return \Illuminate\Http\Response
     */
    public function show(PollQuestion $pollQuestions)
    {
        $pollQuestions->load(['poll']);

        return new PollQuestionResource($pollQuestions);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PollQuestion  $pollQuestions
     * @return \Illuminate\Http\Response
     */
    public function edit(PollQuestion $pollQuestions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PollQuestion  $pollQuestions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PollQuestion $pollQuestions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PollQuestion  $pollQuestions
     * @return \Illuminate\Http\Response
     */
    public function destroy(PollQuestion $pollQuestions)
    {
        //
    }
}
