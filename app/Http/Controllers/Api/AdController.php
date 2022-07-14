<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Ad\Api\StoreRequest;
use App\Http\Requests\Ad\Api\UpdateRequest;
use App\Http\Resources\AdReportResource;
use App\Http\Resources\AdResource;
use App\Http\Resources\Api\AdEditResource;
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
use Symfony\Component\HttpFoundation\Response as ResponseAlias;
use function abort_if;
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
            'highestPrice', 'lowestPrice' => 'price',
            default => 'id',
        } : 'published_at';
        $order = match (request()->sortBy) {
            'oldest', 'lowestPrice' => false,
            default => true,
        };

        return AdResource::collection(Ad::query()
            ->select(['title', 'slug', 'price', 'district_id', 'category_id', 'updated_at', 'updated_at', 'id', 'is_published', 'user_id', 'published_at', 'currency_id', 'is_chat_enabled'])
            ->published()
            ->with('media')
            ->when($category->exists, fn(Builder $query) => $query->whereCategoryId($category->id))
            ->filter(request())
            ->get()
            ->sortBy(auth('api')->check() ? fn(Ad $ad) => District::whereStateId(auth('api')->user()->state_id)
                ->get()
                ->find($ad->district_id) : $sortBy, descending: $order)
            ->paginate(24)
            ->withQueryString());
    }

    public function store(StoreRequest $request): JsonResponse
    {
        try {
            DB::transaction(function() use ($request) {
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
                if ($request->has('images') && $request->hasFile('images')) {
                    $ad->addMultipleMediaFromRequest(['images'])
                        ->each(function($fileAdder) {
                            $fileAdder->toMediaCollection('ads');
                        });
                }
            });
        } catch (Exception $exception) {
            return response()->json(
                [
                    'message' => 'ارسال آگهی با مشکل روبرو شد. لطفاً دوباره کوشش نمایید!',
                ], ResponseAlias::HTTP_BAD_REQUEST);
        }

        return response()->json(
            [
                'message' => 'آگهی شما ارسال شد. لطفاً منتظر تاییدی مدیر سایت و نشر آن بروی سایت باشید!',
            ], ResponseAlias::HTTP_CREATED);
    }

    public function show(Ad $ad): JsonResponse
    {
        abort_if($ad->is_published === false, ResponseAlias::HTTP_NOT_FOUND, 'آگهی منقضی شده است!');

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

    public function edit(Ad $ad): AdEditResource
    {
        return AdEditResource::make($ad->load(['category', 'currency', 'district.state', 'attributes.values', 'values', 'media']));
    }

    public function update(UpdateRequest $request, Ad $ad): JsonResponse
    {
        if ($ad->is_published) {
            if ($ad->user_id === auth('api')->id()) {
                try {
                    DB::transaction(function() use ($request, $ad) {
                        $ad->update($request->validated() + ['is_published' => false]);
                        // Sync Attributes
                        if ($request->input('attributes') && count(request()->input('attributes')) > 0) {
                            $ad->attributes()->sync($request->input('attributes'));
                        }
                        // Sync Values
                        if ($request->input('values') && count(request()->input('values')) > 0) {
                            $ad->values()->sync($request->input('values'));
                        }
                        // Sync Media
                        if ($request->has('images') && $request->hasFile('images')) {
                            if (count($ad->media) > 0) {
                                $ad->clearMediaCollection('ads');
                            }

                            $ad->addMultipleMediaFromRequest(['images'])
                                ->each(function($fileAdder) {
                                    $fileAdder->toMediaCollection('ads');
                                });
                        }

                        return response()->json(
                            [
                                'message' => '.آگهی شما ویرایش شد',
                            ], ResponseAlias::HTTP_CREATED);
                    });
                } catch (Exception $exception) {
                    return response()->json(
                        [
                            'message' => '!ویرایش آگهی با مشکل روبرو شد. لطفاً دوباره کوشش نمایید',
                        ], ResponseAlias::HTTP_BAD_REQUEST);
                }
            } else {
                return response()->json(
                    [
                        'message' => '!شما سازنده آگهی نیستید! پس امکان ویرایش وجود ندارد',
                    ], ResponseAlias::HTTP_BAD_REQUEST);
            }
        } else {
            return response()->json(
                [
                    'message' => '!ویرایش آگهی شما در انتظار تایید مدیر سایت است. تا تایید آن شکیبا باشید یا آگهی شما تا هنوز منتشر نشده است',
                ], ResponseAlias::HTTP_BAD_REQUEST);
        }

        return response()->json(
            [
                'message' => '.آگهی شما ویرایش شد',
            ], ResponseAlias::HTTP_CREATED);
    }

    public function bookmark(Ad $ad): JsonResponse
    {
        if (Bookmark::has($ad, auth('api')->user())) {
            Bookmark::remove($ad, auth('api')->user());

            return response()->json(['message' => 'آگهی با موفقیت از لیست بوکمارک ها حذف شد.'], ResponseAlias::HTTP_CREATED);
        }

        Bookmark::add($ad, auth('api')->user());

        return response()->json(['message' => 'آگهی با موفقیت به لیست بوکمارک ها اضافه شد.'], ResponseAlias::HTTP_CREATED);
    }

    public function userAds(): JsonResponse
    {
        $ads = Ad::isOwner()
            ->select(['title', 'slug', 'price', 'district_id', 'category_id', 'created_at', 'id', 'is_published', 'user_id', 'published_at', 'is_chat_enabled'])
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
            ->select(['title', 'slug', 'price', 'district_id', 'category_id', 'created_at', 'id', 'is_published', 'user_id', 'published_at', 'is_chat_enabled'])
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
        ], ResponseAlias::HTTP_CREATED);
    }
}
