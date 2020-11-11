<?php

namespace App\Http\Controllers;

use App\Models\PollResult;
use App\Http\Resources\PollResultResource as PollResultResource;
use Illuminate\Http\Request;

class PollResultsController extends Controller
{
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
     * @param  \App\Models\PollResult  $pollResults
     * @return \Illuminate\Http\Response
     */
    public function show(PollResult $pollResults)
    {
        return new PollResultResource($pollResults);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PollResult  $pollResults
     * @return \Illuminate\Http\Response
     */
    public function edit(PollResult $pollResults)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PollResult  $pollResults
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PollResult $pollResults)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PollResult  $pollResults
     * @return \Illuminate\Http\Response
     */
    public function destroy(PollResult $pollResults)
    {
        //
    }
}
