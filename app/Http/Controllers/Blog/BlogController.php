<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Resources\Blog\CategoryResource;
use App\Http\Resources\Blog\PostResource;
use App\Http\Resources\Blog\PostResourceFull;
use App\Models\Blog\Category;
use App\Models\Blog\Post;
use Inertia\Inertia;
use Inertia\Response;

class BlogController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Blog/Index', [
            'categories' => CategoryResource::collection(Category::with(['posts.media', 'posts.user', 'posts.category'])
                ->visible()
                ->latest()
                ->get()),
            'featured' => PostResource::collection(Post::with(['category', 'media', 'user'])
                ->published()
                ->featured()
                ->latest()
                ->get()),
            'newest' => PostResource::collection(Post::with(['category', 'media', 'user'])
                ->published()
                ->featured()
                ->latest()
                ->get()),
        ]);
    }

    public function show(Post $post): Response
    {
        $post->load('category', 'media', 'user');

        return Inertia::render('Blog/Post', [
            'post' => PostResourceFull::make($post),
        ]);
    }
}
