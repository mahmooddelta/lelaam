<?php

use App\Http\Resources\AdResource;
use App\Models\Ad;
use App\Models\Category;
use App\Models\District;
use App\Models\State;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::inertia('/', 'Index', [
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
                                        ->select(['title', 'slug', 'price', 'district_id', 'category_id', 'created_at', 'id'])
                                        ->with('media')
                                        ->latest()
                                        ->take(40)
                                        ->get()),
])->name('home');
Route::get('ads/{category:slug?}', function (?Category $category) {
    if ($category->exists) {
        $ads = AdResource::collection($category->load(['ads:title,slug,price,district_id,category_id,created_at', 'ads.media'])
                                          ->ads);
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
})->name('ads');
Route::get('ad/{ad:slug}', function (Ad $ad) {
    $ad->load(['category:name,slug,id', 'user', 'media', 'attributes', 'values.attribute']);

    return Inertia::render('Ad', [
        'ad' => new AdResource($ad),
    ]);
})->name('ad.show');
Route::inertia('categories', 'Categories', [
    'categories' => Category::query()->select(['id', 'name', 'slug'])
        ->withCount(['ads'])
        ->get(),
])->name('categories');

Route::get('chat', function () {
    return Inertia::render('Chat', [

    ]);
})->name('chat');
Route::get('ad/create', function () {
    return Inertia::render('AdCreate', [

    ]);
})->name('ad.create');
Route::middleware([
                      'auth:sanctum',
                      config('jetstream.auth_session'),
                      'verified',
                  ])
    ->group(function () {
        Route::get('/dashboard', function () {
            return Inertia::render('Dashboard');
        })->name('dashboard');

        Route::get('account', function () {
            return Inertia::render('Account', [

            ]);
        })->name('account');
    });
