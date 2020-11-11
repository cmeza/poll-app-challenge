<?php

namespace App\Http\Controllers;

use App\Http\Resources\PollTypeResource as PollTypeResource;
use App\Models\PollType;
use Illuminate\Http\Request;

class PollTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PollTypeResource::collection(PollType::all());
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
     * @param  \App\Models\PollType  $pollTypes
     * @return \Illuminate\Http\Response
     */
    public function show(PollType $pollTypes)
    {
        return new PollTypeResource($pollTypes);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PollType  $pollTypes
     * @return \Illuminate\Http\Response
     */
    public function edit(PollType $pollTypes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PollType  $pollTypes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PollType $pollTypes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PollType  $pollTypes
     * @return \Illuminate\Http\Response
     */
    public function destroy(PollType $pollTypes)
    {
        //
    }
}
