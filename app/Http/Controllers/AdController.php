<?php

namespace App\Http\Controllers;

use App\Http\Requests\Ad\StoreRequest;
use App\Http\Resources\AdResource;
use App\Http\Resources\AttributeResource;
use App\Models\Ad;
use App\Models\Category;
use App\Models\Currency;
use App\Models\District;
use App\Models\State;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Inertia\Response;
use Maize\Markable\Models\Bookmark;
use Maize\Markable\Models\Like;
use function auth;
use function back;
use function count;
use function redirect;
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
            'currencies' => Currency::select(['id', 'name'])->get()->prepend(['id' => 0, 'name' => 'توافقی']),
            'states' => State::select(['id', 'name'])->get(),
            'districts' => District::select(['id', 'name', 'state_id'])
                ->when(request()->has('state'), fn($query) => $query->where('state_id', request('state')))
                ->get(),
            'categories' => Category::select(['slug', 'name', 'id'])->get(),
            'attributes' => request()->has('category') ? AttributeResource::collection(Category::whereSlug(request('category'))
                                                                                           ->orWhere('name', request('category'))
                                                                                           ->orWhere('id', request('category'))
                                                                                           ->first()
                                                                                           ?->attributes()
                                                                                           ->with('values')
                                                                                           ->get()) : [],
            'category' => request()->has('category') ? request('category') : null,
            'state' => request()->has('state') ? request('state') : null,
        ]);
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        try {
            DB::transaction(function () use ($request) {
                $ad = Ad::create($request->validated());
                // Sync Attributes
                if ($request->input('attributes') && count(request()->input('attributes')) > 0) {
                    $ad->attributes()->sync($request->input('attributes'));
                }
                // Sync Values
                if ($request->input('values') && count(request()->input('values')) > 0) {
                    $ad->values()->sync($request->input('values'));
                }
                // Sync Media
                if ($request->input('images') && count($request->input('images')) > 0) {
                    $ad->addMediaFromRequest($request->input('images'))
                        ->toMediaCollection('ads');
                }

                return redirect()
                    ->route('home')
                    ->with([
                               'type' => 'success',
                               'body' => 'آگهی شما ارسال شد. لطفاً منتظر تاییدی مدیر سایت و نشر آن بروی سایت باشید!',
                           ]);
            });
        } catch (Exception $exception) {
            return back()
                ->with([
                           'type' => 'error',
                           'body', 'ارسال آگهی با مشکل روبرو شد. لطفاً دوباره کوشش نمایید!',
                       ]);
        }

        return back()
            ->with([
                       'type' => 'error',
                       'body', 'ارسال آگهی با مشکل روبرو شد. لطفاً دوباره کوشش نمایید!',
                   ]);
    }
}
