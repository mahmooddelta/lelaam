<?php

use App\Http\Controllers\Api\AdController;
use App\Http\Controllers\Api\AppController;
use App\Http\Controllers\Api\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('categories', [CategoryController::class, 'index']);
Route::get('states', [AppController::class, 'states']);
Route::get('districts/{state:name?}', [AppController::class, 'districts']);
// Ads
Route::get('ads/{category:slug?}', [AdController::class, 'index']);
Route::post('ad/create', [AdController::class, 'store']);
Route::post('ad/{ad:slug}/update', [AdController::class, 'update']);
// Ad Bookmark
Route::get('ad/{ad:slug}/bookmark', [AdController::class, 'bookmark']);
// User Bookmarked Ads
Route::get('user/bookmarked/ads', [AdController::class, 'userBookmarkedAds']);
// User Ads
Route::get('user/ads', [AdController::class, 'userAds']);
