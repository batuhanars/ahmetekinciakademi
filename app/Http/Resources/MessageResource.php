<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource
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
            "conversation" => $this->conversation,
            "sender" => $this->sender,
            "receiver" => $this->receiver,
            "conversation_id" => $this->conversation_id,
            "sender_id" => $this->sender_id,
            "receiver_id" => $this->receiver_id,
            "read" => $this->read,
            "body" => $this->body,
            "created_at" => $this->created_at->diffForHumans()
        ];
    }
}
