<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PollTypeResource extends BaseResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'type' => $this->type,
            'created' => $this->dateFormat($this->created_at),
            'updated' => $this->dateFormat($this->updated_at),
            'deleted' => $this->dateFormat($this->deleted_at),
        ];
    }
}
