<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChatController;
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
Route::get('states/load', [WebsiteController::class, 'states'])->name('states.load');
Route::get('ad/create', [AdController::class, 'create'])->name('ad.create');
Route::post('ad/create', [AdController::class, 'store'])->name('ad.create.store');
Route::get('ads/{category:slug?}', [AdController::class, 'index'])->name('ads');
Route::get('ad/{ad:slug}', [AdController::class, 'show'])->name('ad.show');
Route::get('categories', [CategoryController::class, 'index'])->name('categories');
Route::get('chat', [ChatController::class, 'index'])->name('chat');
// Phone Verification
Route::get('phone/unverified', [WebsiteController::class, 'phoneUnverified'])->name('phone.unverified');
Route::post('phone/verify', [WebsiteController::class, 'phoneVerify'])
    ->name('phone.verify')
    ->middleware('auth');
// Protected routes
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'phone.verified'])
    ->group(function () {
        Route::get('account', [AccountController::class, 'index'])
            ->name('account');
        Route::get('account/user/state/{state}/change', [AccountController::class, 'changeState'])
            ->name('account.user.state.change');
        Route::get('ad/{ad:slug}/bookmark', [AdController::class, 'bookmark'])
            ->name('ad.bookmark');
    });

Route::mediaLibrary();
