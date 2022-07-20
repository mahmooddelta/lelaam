<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AttributeResource;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryController extends Controller
{
    public function index(): JsonResource
    {
        return CategoryResource::collection(Category::visible()
            ->whereNull('parent_id')
            ->select(['id', 'parent_id', 'name', 'slug', 'description'])
            ->with(['children' => fn($query) => $query->select(['id', 'name', 'slug', 'parent_id'])])
            ->withCount(['ads' => fn($query) => $query->published()])
            ->orderByDesc('ads_count')
            ->get());
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
