<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'sender' => $this->whenLoaded('sender', new UserResource($this->sender)),
            'receiver' => $this->whenLoaded('receiver', new UserResource($this->receiver)),
            'body' => $this->body,
            'has_seen' => $this->has_seen,

            'created_at' => $this->whenNotNull($this->created_at?->diffForHumans()),
            'updated_at' => $this->whenNotNull($this->updated_at?->diffForHumans()),

            'ad' => new AdResource($this->whenLoaded('ad')),
        ];
    }
}
