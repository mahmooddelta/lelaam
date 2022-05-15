<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;
use function count;
use function secure_asset;

/** @mixin \App\Models\Ad */
class AdResource extends JsonResource
{
    /**
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'title' => Str::limit($this->title, 50),
            'slug' => $this->slug,
            'price' => $this->price,
            'currency' => $this->currency->name ?? 'افغانی',
            'phone_number' => $this->when($this->phone_number, $this->phone_number),
            'desc' => $this->when($this->desc, $this->desc),
            'address' => $this->when($this->address, $this->address),
            'thumb' => count($this->media) > 0 ? $this->media?->first()
                ?->getUrl('thumb') : secure_asset('images/No_image_preview.png'),
            'created_at' => $this->created_at->diffForHumans(),

            'attributes' => $this->whenLoaded('attributes', fn() => $this->attributes),
            'media' => $this->whenLoaded('media', fn() => $this->media),
            'values' => $this->whenLoaded('values', fn() => $this->values),

            'user' => $this->when('user', $this?->user?->name ?? 'مهمان'),
            'category' => $this->when('category', $this?->category?->name ?? 'Category'),
            'district' => $this->when('district', $this?->district?->name ?? 'District'),
        ];
    }
}
