<?php

namespace App\Http\Controllers;

use App\Http\Resources\AdResource;
use App\Models\Ad;
use App\Models\Category;
use App\Models\District;
use App\Models\State;
use Illuminate\Database\Eloquent\Builder;
use Inertia\Inertia;

class AdController extends Controller
{
    public function index(?Category $category)
    {
        $ads = Ad::query()
            ->published()
            ->select(['title', 'slug', 'price', 'district_id', 'category_id', 'created_at', 'id'])
            ->when($category->exists, fn(Builder $query) => $query->whereCategoryId($category->id))
            ->latest()
            ->paginate(24);

        return Inertia::render('Ads', [
            'ads' => AdResource::collection($ads),
            'categories' => Category::select(['name', 'slug'])->get(),
            'states' => State::select(['id', 'name'])->get(),
            'districts' => District::select(['id', 'name', 'state_id'])
                ->when(request()->has('state'), fn($query) => $query->where('state_id', request('state')))
                ->get(),
        ]);
    }

    public function show(Ad $ad)
    {
        $ad->load(['category:name,slug,id', 'user', 'media', 'attributes', 'values.attribute']);

        return Inertia::render('Ad', [
            'ad' => new AdResource($ad),
        ]);
    }

    public function create()
    {
        return Inertia::render('AdCreate', [

        ]);
    }
}
