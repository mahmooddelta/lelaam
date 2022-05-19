<?php

use App\Http\Controllers\AdController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\WebsiteController;
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

Route::get('/', [WebsiteController::class, 'index'])->name('home');
Route::get('ads/{category:slug?}', [AdController::class, 'index'])->name('ads');
Route::get('ad/{ad:slug}', [AdController::class, 'show'])->name('ad.show');
Route::get('categories', [CategoryController::class, 'index'])->name('categories');
Route::get('chat', [ChatController::class, 'index'])->name('chat');

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
        Route::get('account', function () {
            return Inertia::render('Account');
        })->name('account');
    });
