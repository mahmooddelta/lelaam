<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use function str;

/** @mixin \App\Models\Conversation */
class ConversationResource extends JsonResource
{
    /**
     * @param  Request  $request
     *
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'messages_count' => $this->when($this->messages_count, $this->messages_count),

            'ad' => new AdResource($this->whenLoaded('ad')),
            'creator' => new UserResource($this->creator),
            'receiver' => new UserResource($this->receiver),

            'last_message_text' => str($this->messages()->latest()?->first()?->body)->limit(60),
            'last_message_time' => $this->messages()->latest()?->first()?->created_at?->diffForHumans(),
        ];
    }
}
