<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserTicket extends JsonResource
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
            'state' => $this->sate,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'Ticket' => new Ticket($this->ticket),
            'Payment' => new Payment($this->payment)
        ];
    }
}
