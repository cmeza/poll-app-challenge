<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Route;

class PollQuestionResource extends BaseResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $currentRoute = Route::currentRouteName();
        $validRoutes = [
            'questions.show',
            'polls.show'
        ];

        // determine if we're on a route we want to see details of relationships
        $showNode = in_array($currentRoute, $validRoutes);

        if ($currentRoute === 'polls.show') {
            $result = new PollResultResource($this->whenLoaded('result'));
        } else {
            $result = $this->when(
                $showNode,
                new PollResultResource($this->whenLoaded('result'))
            );
        }

        $poll = $this->when(
            ($currentRoute !== 'polls.show'),
            new PollResource($this->whenLoaded('poll'))
        );

        return [
            'id' => $this->id,
            'question' => $this->question,
            'is_int' => $this->is_int,
            'poll' => $poll,
            'result' => $result,
            'created' => $this->dateFormat($this->created_at),
            'updated' => $this->dateFormat($this->updated_at),
            'deleted' => $this->dateFormat($this->deleted_at),
        ];
    }
}
