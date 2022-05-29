<?php

use App\Http\Controllers\Api\AdController;
use App\Http\Controllers\Api\AppController;
use App\Http\Controllers\Api\CategoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('categories', [CategoryController::class, 'index'])->name('categories');
Route::get('states', [AppController::class, 'states'])->name('states');
Route::get('districts/{state:name?}', [AppController::class, 'districts'])->name('districts');
Route::get('ads/{category:slug?}', [AdController::class, 'index'])->name('ads');
