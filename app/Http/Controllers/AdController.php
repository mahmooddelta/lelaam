<?php

namespace App\Http\Controllers;

use App\Http\Resources\AdResource;
use App\Models\Ad;
use App\Models\Category;
use App\Models\District;
use App\Models\State;
use Illuminate\Database\Eloquent\Builder;
use Inertia\Inertia;
use Inertia\Response;
use function request;

class AdController extends Controller
{
    public function index(?Category $category): Response
    {
        $ads = Ad::query()
            ->published()
            ->select(['title', 'slug', 'price', 'district_id', 'category_id', 'created_at', 'id'])
            ->when($category->exists, fn(Builder $query) => $query->whereCategoryId($category->id))
            ->when(request()->has('search') && request('search') !== '', fn(Builder $query) => $query->where('title', 'LIKE', "%".request('search')."%"))
            ->when(request()->has('category') && request('category') !== '', fn(Builder $query) => $query->where('category_id', Category::whereSlug(request('category'))
                ->value('id')))
            ->when(request()->has('district') && request('district') !== '', fn(Builder $query) => $query->where('district_id', request('district')))
            ->when(request()->has('state') && request('state') !== '', fn(Builder $query) => $query->whereIn('district_id', District::whereStateId(request('state'))
                ->pluck('id')->toArray()))
            ->latest()
            ->paginate(24)
            ->withQueryString();

        return Inertia::render('Ads', [
            'ads' => AdResource::collection($ads),
            'categories' => Category::select(['name', 'slug'])->get(),
            'states' => State::select(['id', 'name'])->get(),
            'districts' => District::select(['id', 'name', 'state_id'])
                ->when(request()->has('state'), fn($query) => $query->where('state_id', request('state')))
                ->get(),
            'filters' => [
                'category' => request()->has('category') ? request('category') : null,
                'district' => request()->has('district') ? request('district') : null,
                'state' => request()->has('state') ? request('state') : null,
                'search' => request()->has('search') ? request('search') : null,
            ],
            'routeResourceName' => request()->route()->getName(),
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
