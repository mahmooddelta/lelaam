<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AdResource;
use App\Models\Ad;
use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use function compact;
use function request;
use function response;

class AdController extends Controller
{
    public function index(Category $category)
    {
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
        $ads = AdResource::collection(Ad::query()
                                          ->select(['title', 'slug', 'price', 'district_id', 'category_id', 'created_at', 'id', 'is_published', 'user_id'])
                                          ->published()
                                          ->when($category->exists, fn(Builder $query) => $query->where('category_id', $category->id))
                                          ->filter(request())
                                          ->orderBy($sortBy, $order)
                                          ->when(request()->has('hasImages') && request('hasImages') === 'true', fn(Builder $builder) => $builder->whereHas('media'))
                                          ->paginate(24)
                                          ->withQueryString());

        return response()->json(compact('ads', 'filters'));
    }

    public function show(Ad $ad)
    {
        //
    }

    public function update(Request $request, Ad $ad)
    {
        //
    }

    public function destroy(Ad $ad)
    {
        //
    }
}
