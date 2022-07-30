<?php

namespace App\Http\Resources;

use AshAllenDesign\ShortURL\Models\ShortURL;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;
use function count;
use function is_null;
use function secure_asset;
use function url;

/** @mixin \App\Models\Ad */
class AdResource extends JsonResource
{
    /**
     * @param  Request  $request
     *
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
            'is_chat_enabled' => $this->when($this->is_chat_enabled, $this->is_chat_enabled),
            'thumb' => count($this->media) > 0 ? $this->media?->first()
                ?->getUrl('thumb') : secure_asset('images/No_image_preview.png'),

            'created_at' => $this->whenNotNull($this->created_at?->diffForHumans()),
            'updated_at' => $this->whenNotNull($this->updated_at?->diffForHumans()),

            'published_at' => $this->whenNotNull($this->published_at?->diffForHumans()),
            'is_published' => $this->when($this->is_published, $this->is_published),
            'is_expired' => $this->when($this->expires_at, $this->expires_at?->isPast()),

            'attributes' => AttributeResource::collection($this->whenLoaded('attributes')),
            'values' => AttributeValueResource::collection($this->whenLoaded('values')),

            'media' => MediaResource::collection($this->whenLoaded('media')),

            'user' => $this->when('user', $this?->user?->name ?? 'مهمان'),
            'user_info' => $this->when(! is_null($this->user_id), $this?->user?->only(['phone', 'email'])),
            'category' => CategoryResource::make($this->whenLoaded('category')),
            'district' => $this->when('district', $this?->district?->name ?? 'District'),
            'state' => $this?->district?->state?->name ?? 'State',

            'bookmarks' => BookmarkResource::collection($this->whenLoaded('bookmarkers')),

            'conversations' => ConversationResource::collection($this->whenLoaded('conversations')),
            'short_link' => ShortURL::findByDestinationURL(url('post/'.$this->slug))?->first()?->default_short_url ?? '',
        ];
    }
}
