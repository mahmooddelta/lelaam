<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AttributeResource;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryController extends Controller
{
    public function index(): JsonResource
    {
        return CategoryResource::collection(Category::whereIsVisible(true)
                                                ->whereNull('parent_id')
                                                ->select(['id', 'parent_id', 'name', 'slug', 'description'])
                                                ->with(['children' => fn($query) => $query->select(['id', 'name', 'slug', 'parent_id'])])
                                                ->get());
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Category $category)
    {
        //
    }

    public function update(Request $request, Category $category)
    {
        //
    }

    public function destroy(Category $category)
    {
        //
    }

    public function attributes(Category $category): AnonymousResourceCollection
    {
        $category->load('attributes.values');

        return AttributeResource::collection($category->attributes()
                                                 ->isActive()
                                                 ->with(['values' => fn($query) => $query->select(['id', 'attribute_id', 'name'])])
                                                 ->get());
    }
}
