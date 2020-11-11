<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PollTypeStoreRequest;
use App\Http\Requests\PollTypeUpdateRequest;
use App\Http\Resources\PollTypeResource;
use App\Models\PollType;
use Illuminate\Http\Request;

class PollTypesController extends Controller
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
        return PollTypeResource::collection(PollType::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PollTypeStoreRequest $request)
    {
        $validData = $request->validated();

        $pollType = new PollType();
        $pollType->type = $validData['type'];
        $pollType->save();

        return (new PollTypeResource($pollType))
            ->response()
            ->setStatusCode(201);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PollType  $pollTypes
     * @return \Illuminate\Http\Response
     */
    public function update(PollTypeUpdateRequest $request, PollType $pollTypes)
    {
        $validData = $request->validated();

        $pollTypes->type = $validData['type'];

        $pollTypes->save();

        return (new PollTypeResource($pollTypes))
            ->response()
            ->setStatusCode(200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PollType  $pollTypes
     * @return \Illuminate\Http\Response
     */
    public function destroy(PollType $pollTypes)
    {
        $this->canUser('delete');

        $pollTypes->delete();

        return response()->json(null, 204);
    }
}
