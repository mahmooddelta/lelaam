<?php

use App\Http\Controllers\Api\AdController;
use App\Http\Controllers\Api\AppController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('categories', [CategoryController::class, 'index']);
Route::get('category/{category:slug}/attributes', [CategoryController::class, 'attributes']);
Route::get('states', [AppController::class, 'states']);
Route::get('districts/{state:name?}', [AppController::class, 'districts']);
// Ads
Route::get('posts/{category:slug?}', [AdController::class, 'index']);
Route::get('post/{ad:slug}', [AdController::class, 'show']);
Route::post('post/create', [AdController::class, 'store']);
Route::put('post/{ad:slug}/update', [AdController::class, 'update']);
// Ad Bookmark
Route::get('post/{ad:slug}/bookmark', [AdController::class, 'bookmark']);
// Auth Endpoints
Route::post('register', [AuthController::class, 'register']);
Route::middleware(['api'])->prefix('auth')->group(function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
    Route::post('profile/update', [AuthController::class, 'updateProfile']);
    Route::put('profile/password/update', [AuthController::class, 'profilePasswordUpdate']);
});
Route::middleware(['api', 'jwt'])->group(function () {
    // User Bookmarked Ads
    Route::get('user/bookmarked/posts', [AdController::class, 'userBookmarkedAds']);
    // User Ads
    Route::get('user/ads', [AdController::class, 'userAds']);
});
