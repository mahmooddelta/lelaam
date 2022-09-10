<?php

namespace App\Http\Resources\Blog;

use App\Models\Blog\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Category */
class CategoryResource extends JsonResource
{
    /**
     * @param Request $request
     *
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->when($this->id, $this->id),
            'name' => $this->name,
            'slug' => $this->slug,

            'description' => $this->when($this->description, $this->description),
            'position' => $this->when($this->position, $this->position),
            'is_visible' => $this->when($this->is_visible, $this->is_visible),

            'posts_count' => $this->when($this->posts_count, $this->posts_count),

            'posts' => PostResource::collection($this->whenLoaded('posts')),
        ];
    }
}
