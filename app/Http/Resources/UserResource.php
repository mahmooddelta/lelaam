<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\User */
class UserResource extends JsonResource
{
    /**
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'email_verified_at' => $this->email_verified_at,
            'created_at' => $this->created_at->diffForHumans() ?? '',
            'state_id' => $this->state_id,
            'phone' => $this->phone,
            'phone_verified_at' => $this->phone_verified_at,
            'profile_photo_url' => $this->profile_photo_url,
            'ads_count' => $this->ads_count,

            'ads' => AdResource::collection($this->whenLoaded('ads')),
        ];
    }
}
