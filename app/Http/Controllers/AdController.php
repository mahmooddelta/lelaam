<?php

namespace App\Http\Controllers;

use App\Http\Resources\AdResource;
use App\Models\Ad;
use App\Models\Category;
use App\Models\District;
use App\Models\State;
use Inertia\Inertia;

class AdController extends Controller
{
    public function index(?Category $category)
    {
        if ($category->exists) {
            $ads = AdResource::collection($category->load(['ads:title,slug,price,district_id,category_id,created_at,is_published', 'ads.media'])
                                              ->ads->where('is_published', true));
        } else {
            $ads = AdResource::collection(Ad::query()->published()
                                              ->select(['title', 'slug', 'price', 'district_id', 'category_id', 'created_at'])
                                              ->latest()
                                              ->take(40)
                                              ->get());
        }

        return Inertia::render('Ads', [
            'ads' => $ads,
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
