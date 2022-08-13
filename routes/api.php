<?php

use App\Http\Controllers\Api\AdController;
use App\Http\Controllers\Api\AppController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ChatController;
use App\Http\Controllers\Api\ConversationsController;
use App\Http\Controllers\Blog\CategoryController as BlogCategoryController;
use App\Http\Controllers\Blog\PostController;
use Illuminate\Support\Facades\Route;

Route::get('categories', [CategoryController::class, 'index']);
Route::get('category/{category:slug}/attributes', [CategoryController::class, 'attributes']);
Route::get('states', [AppController::class, 'states']);
Route::get('report_types', [AppController::class, 'reportTypes']);
Route::get('currencies', [AppController::class, 'currencies']);
Route::get('districts/{state:name?}', [AppController::class, 'districts']);
// Auth Endpoints
Route::post('register', [AuthController::class, 'register']);
Route::middleware(['api'])->prefix('auth')->group(function() {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::get('me', [AuthController::class, 'me']);
    Route::post('profile/update', [AuthController::class, 'updateProfile']);
    // Phone verification
    Route::get('profile/phone/verified/status', [AuthController::class, 'profilePhoneVerified']);
});
Route::middleware(['api', 'jwt'])->group(function() {
    // Ad Reports
    Route::get('post/reports', [AdController::class, 'reports']);
    // Report Create
    Route::post('post/{ad:slug}/report', [AdController::class, 'report']);
    // User Bookmarked Ads
    Route::get('user/bookmarked/posts', [AdController::class, 'userBookmarkedAds']);
    // User Ads
    Route::get('user/posts', [AdController::class, 'userAds']);
    // Ad Bookmark
    Route::get('post/{ad:slug}/bookmark', [AdController::class, 'bookmark']);
    // Update auth user verified phone field
    Route::post('auth/profile/phone/verify', [AuthController::class, 'profilePhoneVerifiedUpdate']);
    // Protected routes with phone verification
    Route::middleware(['api.phone.verified'])->group(function() {
        // Conversations
        Route::get('conversations', [ChatController::class, 'index']);
        Route::get('conversation/{ad:slug}/{conversation?}/messages', [ChatController::class, 'create']);
        Route::delete('conversation/{conversation}/destroy', [ConversationsController::class, 'destroy']);
        // Chat
        Route::post('chat/{ad:slug}/store', [ChatController::class, 'store']);
        Route::delete('chat/{message}/destroy', [ChatController::class, 'destroy']);
    });
    // Post Update
    Route::get('post/{ad:slug}/edit', [AdController::class, 'edit']);
    Route::post('post/{ad:slug}/update', [AdController::class, 'update']);
});
// Ads
Route::get('posts/{category:slug?}', [AdController::class, 'index']);
Route::post('post/create', [AdController::class, 'store']);
Route::get('post/{ad:slug}', [AdController::class, 'show']);
// Blog
Route::get('blog/categories', BlogCategoryController::class);
Route::get('blog/posts', PostController::class);
