<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PollTypeRequest;
use App\Http\Resources\PollTypeResource;
use App\Models\PollType;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class PollTypesController extends Controller
{
    /**
     * PollTypesController constructor.
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
        return PollTypeResource::collection(PollType::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PollTypeRequest $request
     * @return JsonResponse|Response|object
     */
    public function store(PollTypeRequest $request)
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
     * @param PollType $pollTypes
     * @return PollTypeResource
     */
    public function show(PollType $pollTypes)
    {
        return new PollTypeResource($pollTypes);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PollTypeRequest $request
     * @param PollType $pollTypes
     * @return JsonResponse|Response|object
     */
    public function update(PollTypeRequest $request, PollType $pollTypes)
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
     * @param PollType $pollTypes
     * @return JsonResponse|Response
     * @throws \Exception
     */
    public function destroy(PollType $pollTypes)
    {
        $this->canUser('delete');

        $pollTypes->delete();

        return response()->json(null, 204);
    }
}
