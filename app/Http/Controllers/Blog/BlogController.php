<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Resources\Blog\CategoryResource;
use App\Http\Resources\Blog\PostResource;
use App\Http\Resources\Blog\PostResourceFull;
use App\Models\Blog\Category;
use App\Models\Blog\Post;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class BlogController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Blog/Index', [
            'categories' => CategoryResource::collection(Category::with([
                'posts' => fn($query) => $query->with(['media', 'user', 'category'])->published(),
            ])
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
                ->latest()
                ->get()),
        ]);
    }

    public function posts(Request $request): Response
    {
        $posts = Post::query()
            ->when($request->has('tag') && $request->filled('tag'), fn(Builder $builder) => $builder->whereHas('tags', fn($query) => $query->containing($request->input('tag'))))
            ->with(['media', 'user', 'category'])
            ->published()
            ->latest()
            ->paginate(9)
            ->withQueryString();

        return Inertia::render('Blog/Posts', [
            'posts' => PostResource::collection($posts)
        ]);
    }

    public function show(Post $post): Response
    {
        $post->load('category', 'media', 'user', 'tags');

        return Inertia::render('Blog/Post', [
            'post' => PostResourceFull::make($post),
        ]);
    }
}
