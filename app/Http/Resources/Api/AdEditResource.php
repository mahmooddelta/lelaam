<?php

namespace App\Http\Resources\Api;

use App\Http\Resources\AdReportResource;
use App\Http\Resources\AttributeResource;
use App\Http\Resources\AttributeValueResource;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\CurrencyResource;
use App\Http\Resources\DistrictResource;
use App\Http\Resources\StateResource;
use App\Http\Resources\UserResource;
use App\Models\Ad;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Ad */
class AdEditResource extends JsonResource
{
    public static $wrap = null;

    /**
     * @param  Request  $request
     *
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'title' => $this->title,
            'slug' => $this->slug,
            'price' => $this->price,
            'phone_number' => $this->phone_number,
            'desc' => $this->desc,
            'address' => $this->address,

            'currency' => new CurrencyResource($this->whenLoaded('currency')),
            'district' => new DistrictResource($this->whenLoaded('district')),
            'state' => new StateResource($this->whenLoaded('district.state')),

            'attributes' => AttributeResource::collection($this->whenLoaded('attributes')),
            'values' => AttributeValueResource::collection($this->whenLoaded('values')),

            'category' => new CategoryResource($this->whenLoaded('category')),
            'media' => MediaApiResource::collection($this->whenLoaded('media')),
            'reports' => AdReportResource::collection($this->whenLoaded('reports')),
            'user' => new UserResource($this->whenLoaded('user')),
        ];
    }
}
