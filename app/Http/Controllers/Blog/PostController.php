<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Resources\Blog\PostResource;
use App\Models\Blog\Post;

class PostController extends Controller
{
    public function __invoke()
    {
        return PostResource::collection(Post::with([
            'user',
            'category:name,slug,id',
            'media',
            'tags',
        ])->get());
    }
}
