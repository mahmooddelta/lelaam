<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Inertia\Inertia;

class CategoryController extends Controller
{
    public function index()
    {
        return Inertia::render('Categories', [
            'categories' => Category::query()->select(['id', 'name', 'slug'])
                ->withCount(['ads'])
                ->get(),
        ]);
    }
}
