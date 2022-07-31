<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \Spatie\Tags\Tag */
class TagResource extends JsonResource
{
    /**
     * @param  Request  $request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'type' => $this->type,
            'order_column' => $this->order_column,

//            'created_at' => $this->when($this->created_at, $this?->created_at?->diffForHumans()),
//            'updated_at' => $this->when($this->updated_at, $this?->updated_at?->diffForHumans()),
        ];
    }
}
