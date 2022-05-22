<?php

namespace App\Http\Controllers;

use App\Http\Resources\AdResource;
use App\Models\Ad;
use App\Models\Category;
use App\Models\District;
use App\Models\State;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;
use Maize\Markable\Models\Bookmark;
use Maize\Markable\Models\Like;
use function auth;
use function back;
use function request;

class AdController extends Controller
{
    public function index(?Category $category): Response
    {
        $ads = Ad::query()
            ->select(['title', 'slug', 'price', 'district_id', 'category_id', 'created_at', 'id', 'is_published', 'user_id'])
            ->published()
            //->when(auth()->check(), fn(Builder $query) => $query->orderByDesc('district_id'))
            //->when(! auth()->check(), fn(Builder $query) => $query->latest())
            ->when($category->exists, fn(Builder $query) => $query->whereCategoryId($category->id))
            ->filter(request())
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

    public function show(Ad $ad): Response
    {
        $ad->load(['category:name,slug,id', 'user', 'media', 'attributes', 'values.attribute', 'bookmarkers']);

        // Add the add to user's viewed ads
        if (auth()->check()) {
            Like::add($ad, auth()->user());
        }

        return Inertia::render('Ad', [
            'ad' => new AdResource($ad),
            'is_bookmarked' => auth()->check() ? $ad->whereHasBookmark(auth()->user())
                ->whereSlug($ad->slug)
                ->exists() : false,
        ]);
    }

    public function bookmark(Ad $ad): RedirectResponse
    {
        Bookmark::toggle($ad, auth()->user());

        return back()->with('flash', 'آگهی با موفقیت به لیست بوکمارک ها اضافه شد.');
    }

    public function create(): Response
    {
        return Inertia::render('AdCreate', [

        ]);
    }
}
