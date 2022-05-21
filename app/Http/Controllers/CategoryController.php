<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Inertia\Inertia;

class CategoryController extends Controller
{
    public function index()
    {
        return Inertia::render('Categories', [
            'categories' => CategoryResource::collection(Category::query()->select(['id', 'name', 'slug'])
                                                             ->withCount(['ads' => fn($query) => $query->where('is_published', true)])
                                                             ->paginate(16)),
        ]);
    }
}
