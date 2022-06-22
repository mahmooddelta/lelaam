<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Ad\StoreRequest;
use App\Http\Resources\AdReportResource;
use App\Http\Resources\AdResource;
use App\Models\Ad;
use App\Models\Category;
use App\Models\District;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Maize\Markable\Models\Bookmark;
use Maize\Markable\Models\Like;
use function auth;
use function count;
use function request;
use function response;

class AdController extends Controller
{
    public function index(Category $category): AnonymousResourceCollection
    {
        if (request('sortBy')) {
            Validator::make(request()->all(), ['sortBy' => Rule::in(['newest', 'oldest', 'highestPrice', 'lowestPrice'])])
                ->validate();
        }
        $sortBy = request()->has('sortBy') ? match (request()->sortBy) {
            'newest', 'oldest', 'default' => 'id',
            'highestPrice', 'lowestPrice' => 'price',
        } : 'id';
        $order = request()->has('sortBy') ? match (request()->sortBy) {
            'newest', 'highestPrice', 'default' => 'desc',
            'oldest', 'lowestPrice' => 'asc',
        } : 'desc';
        $filters = [
            'category' => request()->has('category') ? request('category') : null,
            'district' => request()->has('district') ? request('district') : null,
            'state' => request()->has('state') ? request('state') : null,
            'search' => request()->has('search') ? request('search') : null,
            'hasImages' => request()->has('hasImages') ? request('hasImages') : false,
            'sortBy' => request()->has('sortBy') ? request('sortBy') : 'مرتب سازی بر اساس',
        ];

        return AdResource::collection(Ad::query()
                                          ->select(['title', 'slug', 'price', 'district_id', 'category_id', 'updated_at', 'updated_at', 'id', 'is_published', 'user_id'])
                                          ->published()
                                          ->with('media')
                                          ->when($category->exists, fn(Builder $query) => $query->whereCategoryId($category->id))
                                          ->filter(request())
                                          ->get()
                                          ->sortBy(                                           auth('api')->check() ? fn(Ad $ad) => District::whereStateId(auth('api')->user()->state_id)
                                              ->get()
                                              ->find($ad->district_id) : $sortBy, descending: $order)
                                          ->paginate(24)
                                          ->withQueryString());
    }

    public function store(StoreRequest $request)
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
            });
        } catch (Exception $exception) {
            return response()->json(
                [
                    'message' => 'ارسال آگهی با مشکل روبرو شد. لطفاً دوباره کوشش نمایید!',
                ]);
        }

        return response()->json(
            [
                'message' => 'آگهی شما ارسال شد. لطفاً منتظر تاییدی مدیر سایت و نشر آن بروی سایت باشید!',
            ]);
    }

    public function show(Ad $ad): JsonResponse
    {
        $ad->load(['category:name,slug,id', 'user', 'media', 'attributes', 'values.attribute', 'bookmarkers']);

        // Add the add to user's viewed ads
        if (auth('api')->check()) {
            Like::add($ad, auth('api')->user());
        }

        return response()->json(
            [
                'ad' => new AdResource($ad),
            ]);
    }

    public function update(Request $request, Ad $ad): JsonResponse
    {
        try {
            DB::transaction(function () use ($request, $ad) {
                $ad->update()($request->validated());
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
                    if (count($ad->media) > 0) {
                        $ad->clearMediaCollection('ads');
                    }

                    $ad->addMediaFromRequest($request->input('images'))
                        ->toMediaCollection('ads');
                }

                return response()->json(
                    [
                        'message' => 'آگهی شما ویرایش شد.',
                    ]);
            });
        } catch (Exception $exception) {
            return response()->json(
                [
                    'message' => 'ویرایش آگهی با مشکل روبرو شد. لطفاً دوباره کوشش نمایید!',
                ]);
        }

        return response()->json(
            [
                'message' => 'ویرایش آگهی با مشکل روبرو شد. لطفاً دوباره کوشش نمایید!',
            ]);
    }

    public function bookmark(Ad $ad): JsonResponse
    {
        Bookmark::toggle($ad, auth('api')->user());

        return response()->json(['message' => 'آگهی با موفقیت به لیست بوکمارک ها اضافه شد.']);
    }

    public function userAds(): JsonResponse
    {
        $ads = Ad::published()
            ->isOwner()
            ->select(['title', 'slug', 'price', 'district_id', 'category_id', 'created_at', 'id', 'is_published', 'user_id'])
            ->with('media')
            ->get();

        return response()->json([
                                    'ads' => AdResource::collection($ads),
                                ]);
    }

    public function userBookmarkedAds(): AnonymousResourceCollection
    {
        return AdResource::collection(Ad::published()
                                          ->whereHasBookmark(auth('api')->user())
                                          ->select(['title', 'slug', 'price', 'district_id', 'category_id', 'created_at', 'id', 'is_published', 'user_id'])
                                          ->with('media')
                                          ->get());
    }

    public function reports(): JsonResponse
    {
        return response()->json(
            [
                'reports' => AdReportResource::collection(auth('api')
                                                              ->user()
                                                              ?->reports()
                                                              ->active()
                                                              ->with(['ad:id,title'])
                                                              ->get()),
            ]);
    }

    public function report(Ad $ad, Request $request): JsonResponse
    {
        $request->validate(
            [
                'type' => 'required|exists:report_types,id',
                'description' => 'required',
            ]);

        $ad->reports()->create(
            [
                'user_id' => auth('api')->id(),
                'report_type_id' => $request->input('type'),
                'description' => $request->input('description'),
            ]);

        return response()->json([
                                    'message' => 'گزارش تخلف یا مشکل شما ارسال شد. لطفاً منتظر بررسی مدیر سایت باشید!',
                                ]);
    }
}
