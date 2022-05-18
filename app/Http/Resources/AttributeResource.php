<?php

namespace App\Http\Resources;

use App\Models\Attribute;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Attribute */
class AttributeResource extends JsonResource
{
    /**
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'frontend_type' => $this->when($this->frontend_type, Attribute::FRONT_END_TYPES[$this->frontend_type]),

            'ads_count' => $this->when($this->ads_count, $this->ads_count),
            'categories_count' => $this->when($this->categories_count, $this->categories_count),
            'values_count' => $this->when($this->values_count, $this->values_count),

            'ads' => AdResource::collection($this->whenLoaded('ads')),
            'value' => $this->when($this->pivot, $this->getOriginal('pivot_value')),
        ];
    }
}
