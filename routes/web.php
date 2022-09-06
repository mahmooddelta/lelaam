<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdController;
use App\Http\Controllers\Blog\BlogController;
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
Route::post('phone/verify', [WebsiteController::class, 'phoneVerify'])->name('phone.verify.store')->middleware('auth');
// Protected routes
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'phone.verified', 'logs-out-banned-user'])
    ->group(function() {
        Route::get('account', [AccountController::class, 'index'])
            ->name('account');
        Route::get('post/{ad:slug}/bookmark', [AdController::class, 'bookmark'])
            ->name('ad.bookmark');
        Route::post('post/{ad:slug}/report', [AdController::class, 'report'])
            ->name('post.report');
        // Post Edit
        Route::get('post/{post:slug}/edit', [AdController::class, 'edit'])->name('post.edit');
        Route::post('post/{post:slug}/edit', [AdController::class, 'update'])->name('post.update');
        Route::post('post/{post:slug}/sold', [AdController::class, 'sold'])->name('post.sold');
        // Chat & Messaging
        Route::get('chat', [ChatController::class, 'index'])->name('chat');
        Route::get('chat/{ad:slug}/{conversation?}', [ChatController::class, 'create'])->name('chat.create');
        Route::post('chat/{ad:slug}/store', [ChatController::class, 'store'])->name('chat.store');
        Route::delete('conversation/{conversation}/destroy', [ConversationsController::class, 'destroy'])->name('conversation.destroy');
        Route::delete('chat/{message}/destroy', [ChatController::class, 'destroy'])->name('chat.message.destroy');
    });
// Blog routes
Route::get('blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('blog/{post:slug}', [BlogController::class, 'show'])->name('blog.post');
// Other routes
Route::get('about-us', [WebsiteController::class, 'about'])->name('about');
Route::get('contact-us', [WebsiteController::class, 'contact'])->name('contact');
Route::get('privacy', [WebsiteController::class, 'privacy'])->name('privacy');
Route::get('terms-and-conditions', [WebsiteController::class, 'terms'])->name('terms');
// Media Library routes
Route::mediaLibrary();
