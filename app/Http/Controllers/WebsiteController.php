<?php

namespace App\Http\Controllers;

use App\Http\Resources\AdResource;
use App\Models\Ad;
use App\Models\Category;
use App\Models\State;
use Inertia\Inertia;
use Inertia\Response;

class WebsiteController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Index', [
            'categories' => Category::query()->select(['id', 'name', 'slug'])
                ->whereHas('children')
                ->with(['children' => fn($query) => $query->select(['id', 'name', 'slug', 'parent_id'])])
                ->withCount('ads')
                ->latest()
                ->get()
                ->map(function ($category) {
                    $category->setRelation('children', $category->children->take(5));

                    return $category;
                }),
            'ads' => AdResource::collection(Ad::query()->published()
                                                ->select(['title', 'slug', 'price', 'district_id', 'category_id', 'created_at', 'updated_at', 'id'])
                                                ->with('media')
                                                ->latest()
                                                ->take(40)
                                                ->get()),
        ]);
    }

    public function states(): Response
    {
        return Inertia::render('Auth/Register', [
            'states' => State::select(['id', 'name'])->get(),
        ]);
    }
}
