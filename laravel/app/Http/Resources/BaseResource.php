<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BaseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }

    /**
     * @param $date
     * @param string $format
     * @return |null
     */
    public function dateFormat($date, $format = 'm-d-Y h:i:sa')
    {
        if (!is_null($date)) {
            return $date->format($format);
        }

        return null;
    }
}
