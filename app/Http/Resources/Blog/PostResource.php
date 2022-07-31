<?php

namespace App\Http\Resources\Blog;

use App\Http\Resources\MediaResource;
use App\Http\Resources\TagResource;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use function is_null;

/** @mixin \App\Models\Blog\Post */
class PostResource extends JsonResource
{
    /**
     * @param  Request  $request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'title' => $this->title,
            'slug' => $this->slug,

            'content' => $this->when($this->content, $this->content),

            'published_at' => $this->when(! is_null($this->published_at), $this?->published_at?->diffForHumans() ?? ''),
            'is_published' => ! is_null($this->published_at),

            'media_count' => $this->whenCounted('media', $this->media_count),

            'category' => new CategoryResource($this->whenLoaded('category')),
            'media' => MediaResource::collection($this->whenLoaded('media')),
            'user' => new UserResource($this->whenLoaded('user')),
            'tags' => TagResource::collection($this->whenLoaded('tags')),
        ];
    }
}
