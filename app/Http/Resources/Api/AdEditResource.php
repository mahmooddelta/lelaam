<?php

namespace App\Http\Resources\Api;

use App\Http\Resources\AdReportResource;
use App\Http\Resources\AttributeResource;
use App\Http\Resources\AttributeValueResource;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\CurrencyResource;
use App\Http\Resources\DistrictResource;
use App\Http\Resources\MediaResource;
use App\Http\Resources\StateResource;
use App\Http\Resources\UserResource;
use AshAllenDesign\ShortURL\Models\ShortURL;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use function count;
use function secure_asset;
use function url;

/** @mixin \App\Models\Ad */
class AdEditResource extends JsonResource
{
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

            'thumb' => count($this->media) > 0 ? $this->media?->first()
                ?->getUrl('thumb') : secure_asset('images/No_image_preview.png'),

            'is_expired' => $this->when(isset($this->expires_at), $this->expires_at?->isPast()),

            'short_link' => ShortURL::findByDestinationURL(url('post/'.$this->slug))?->first()?->default_short_url ?? '',

            'currency' => new CurrencyResource($this->whenLoaded('currency')),
            'district' => new DistrictResource($this->whenLoaded('district')),
            'state' => new StateResource($this->whenLoaded('district.state')),

            'attributes' => AttributeResource::collection($this->whenLoaded('attributes')),
            'values' => AttributeValueResource::collection($this->whenLoaded('values')),

            'category' => new CategoryResource($this->whenLoaded('category')),
            'media' => MediaResource::collection($this->whenLoaded('media')),
            'reports' => AdReportResource::collection($this->whenLoaded('reports')),
            'user' => new UserResource($this->whenLoaded('user')),
        ];
    }
}
