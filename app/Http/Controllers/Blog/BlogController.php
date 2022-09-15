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
                'posts' => fn($query) => $query->with(['media', 'user', 'category'])->withCount('media')->published(),
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
        $filters = [
            'category' => $request->has('category') ? request('category') : null,
            'tag' => $request->has('tag') ? request('tag') : null,
            'search' => $request->has('search') ? request('search') : null,
            'sortBy' => $request->has('sortBy') ? request('sortBy') : 'مرتب سازی بر اساس',
        ];

        $posts = Post::query()
            ->when($request->has('tag') && $request->filled('tag'), fn(Builder $builder) => $builder->whereHas('tags', fn($query) => $query->containing($request->input('tag'))))
            ->when($request->has('category') && $request->filled('category'), fn(Builder $builder) => $builder->where('blog_category_id', Category::whereSlug($request->input('category'))->value('id')))
            ->when($request->has('search') && $request->filled('search'), fn(Builder $builder) => $builder->where('title', 'LIKE', "%{$request->input('search')}%"))
            ->with(['media', 'user', 'category'])
            ->withCount('media')
            ->published()
            ->orderBy('published_at', $request->input('sortBy') === 'newest' ? 'asc' : 'desc')
            ->paginate(9)
            ->withQueryString();

        $categories = Category::select(['name', 'slug'])->visible()->get();

        return Inertia::render('Blog/Posts', [
            'posts' => PostResource::collection($posts),
            'categories' => CategoryResource::collection($categories),
            'filters' => $filters,
            'routeResourceName' => $request->route()->getName(),
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
