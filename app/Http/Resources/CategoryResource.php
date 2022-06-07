<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Category */
class CategoryResource extends JsonResource
{
    /**
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'parent_id' => $this->when($this->parent_id, $this->parent_id),
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->when($this->description, $this->description),
            'children' => self::collection($this->whenLoaded('children')),

            'ads_count' => $this->when($this->ads_count, $this->ads_count),
            'attributes_count' => $this->when($this->attributes_count, $this->attributes_count),
            'media_count' => $this->when($this->media_count, $this->media_count),

            'ads' => AdResource::collection($this->whenLoaded('ads')),
            'attributes' => AttributeResource::collection($this->whenLoaded('attributes')),
            'media' => MediaResource::collection($this->whenLoaded('media')),
        ];
    }
}
