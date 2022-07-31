<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Resources\Blog\CategoryResource;
use App\Models\Blog\Category;

class CategoryController extends Controller
{
    public function __invoke()
    {
        return CategoryResource::collection(Category::select(['name', 'slug'])->withCount('posts')->orderByDesc('posts_count')->get());
    }
}
