<?php

use App\Http\Resources\AdResource;
use App\Models\Ad;
use App\Models\Category;
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

Route::get('/', function () {
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
                                            ->select(['title', 'slug', 'price', 'district_id', 'category_id', 'created_at'])
                                            ->latest()
                                            ->take(40)
                                            ->get()),
    ]);
})->name('home');
Route::get('ads', function () {
    return Inertia::render('Ads', [
        //'ads' => \App\Models\Ad::paginate(40),
    ]);
})->name('ads');
Route::get('ads/{slug}', function () {
    return Inertia::render('Ads', [
        //'ads' => \App\Models\Post::paginate(40),
    ]);
})->name('ads.show');
Route::get('category', function () {
    return Inertia::render('Categories', [
        'ads' => \App\Models\Category::paginate(16),
    ]);
})->name('category');
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
