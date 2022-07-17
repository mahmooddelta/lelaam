<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ConversationsController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [WebsiteController::class, 'index'])->name('home');
Route::get('post/create', [AdController::class, 'create'])->name('ad.create');
Route::post('post/create', [AdController::class, 'store'])->name('ad.create.store');
Route::get('posts/{category:slug?}', [AdController::class, 'index'])->name('ads');
Route::get('post/{ad:slug}', [AdController::class, 'show'])->name('ad.show');
Route::get('categories', [CategoryController::class, 'index'])->name('categories');
// Phone Verification
Route::get('phone/verify', [WebsiteController::class, 'phoneUnverified'])->name('phone.verify');
Route::post('phone/verify', [WebsiteController::class, 'phoneVerify'])
    ->name('phone.verify.store')
    ->middleware('auth');
// Protected routes
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'phone.verified'])
    ->group(function() {
        Route::get('account', [AccountController::class, 'index'])
            ->name('account');
        Route::get('account/user/state/{state}/change', [AccountController::class, 'changeState'])
            ->name('account.user.state.change');
        Route::get('post/{ad:slug}/bookmark', [AdController::class, 'bookmark'])
            ->name('ad.bookmark');
        Route::post('post/{ad:slug}/report', [AdController::class, 'report'])
            ->name('post.report');
        // Chat & Messaging
        Route::get('chat', [ChatController::class, 'index'])->name('chat');
        Route::get('chat/{ad:slug}', [ChatController::class, 'create'])->name('chat.create');
        Route::post('chat/{ad:slug}/store', [ChatController::class, 'store'])->name('chat.store');
        Route::delete('conversation/{conversation}/destroy', [ConversationsController::class, 'destroy'])->name('conversation.destroy');
        Route::delete('chat/{message}/destroy', [ChatController::class, 'destroy'])->name('chat.message.destroy');
    });

Route::mediaLibrary();
