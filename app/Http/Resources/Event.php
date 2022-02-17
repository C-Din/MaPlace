<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Event extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
          'id' => $this->id,
          'name' => $this->name,
          'image_event' => $this->image_event,
          'date_event' => $this->date_event,
          'time_event' => $this->time_event,
          'state' => $this->state,
          'created_at' => $this->created_at,
          'updated_at' => $this->updated_at,
          'Location' => new Location($this->location)
        ];
    }
}
