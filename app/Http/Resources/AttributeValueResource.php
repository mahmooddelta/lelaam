<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\AttributeValue */
class AttributeValueResource extends JsonResource
{
    /**
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->when($this->id, $this->id),
            'name' => $this->name,

            'ads_count' => $this->ads_count,

            'attribute_id' => $this->when($this->attribute_id, $this->attribute_id),

            'ads' => AdResource::collection($this->whenLoaded('ads')),
            'attribute' => new AttributeResource($this->whenLoaded('attribute')),
        ];
    }
}
