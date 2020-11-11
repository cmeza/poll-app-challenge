<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Route;

class PollResource extends BaseResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $validRoutes = [
            'polls.index',
            'polls.show',
        ];
        $currentRoute = Route::currentRouteName();

        // determine if we're on a route we want to see details of relationships
        $showNode = in_array($currentRoute, $validRoutes);

        $type = $this->when(
            $showNode,
            new PollTypeResource($this->pollType)
        );

        $questions = $this->when(
            $showNode,
            PollQuestionResource::collection($this->whenLoaded('questions'))
        );

        return [
            'id' => $this->id,
            'title' => $this->title,
            'poll_type' => $type,
            'questions' => $questions,
            'created' => $this->dateFormat($this->created_at),
            'updated' => $this->dateFormat($this->updated_at),
            'deleted' => $this->dateFormat($this->deleted_at),
        ];
    }
}
