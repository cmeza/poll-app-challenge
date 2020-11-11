<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Route;

class PollResultResource extends BaseResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $isShowRoute = ('results.show' === Route::currentRouteName());

        $poll = $this->when(
            $isShowRoute,
            new PollResource($this->whenLoaded('poll'))
        );

        $question = $this->when(
            $isShowRoute,
            new PollQuestionResource($this->whenLoaded('question'))
        );

        return [
            'id' => $this->id,
            'value' => $this->value,
            'poll' => $poll,
            'question' => $question,
            'created' => $this->dateFormat($this->created_at),
            'updated' => $this->dateFormat($this->updated_at),
            'deleted' => $this->dateFormat($this->deleted_at),
        ];
    }
}
