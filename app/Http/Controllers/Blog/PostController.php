<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Resources\Blog\PostResource;
use App\Http\Resources\Blog\PostResourceFull;
use App\Models\Blog\Post;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use function request;

class PostController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        if (request()->has('sortBy') || request()->has('category_id') || request()->has('perPage')) {
            Validator::make(request()?->all(),
                [
                    'sortBy' => Rule::in(['newest', 'oldest']),
                    'category_id' => Rule::exists('blog_categories', 'id'),
                    'perPage' => 'integer|min:5|max:100',
                ])->validate();
        }

        $sortBy = 'published_at';

        $order = match (request()->sortBy) {
            'oldest' => 'asc',
            default => 'desc',
        };

        return PostResource::collection(Post::with([
            'user',
            'category:name,slug,id',
            'media',
            'tags',
        ])
            ->when(request()->has('tag') && request()->filled('tag'), fn(Builder $builder) => $builder->whereHas('tags', fn($query) => $query->containing(request()->input('tag'))))
            ->when(request()?->filled('category_id'), fn(Builder $builder) => $builder->where('blog_category_id', request('category_id')))
            ->when(request()?->has('sortBy'), fn(Builder $builder) => $builder->orderBy($sortBy, $order))
            ->when(!request()?->has('sortBy'), fn(Builder $builder) => $builder->orderBy('published_at', 'desc'))
            ->paginate(request('perPage', 6))
            ->withQueryString()
        );
    }

    public function show(Post $post)
    {
        return PostResourceFull::make($post->load(['category', 'media', 'user', 'tags']));
    }
}
