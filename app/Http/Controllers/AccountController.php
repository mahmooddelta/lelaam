<?php

namespace App\Http\Controllers;

use App\Http\Resources\AdResource;
use App\Http\Resources\BookmarkResource;
use App\Models\Ad;
use App\Models\State;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Maize\Markable\Models\Bookmark;
use Maize\Markable\Models\Like;
use function auth;

class AccountController extends Controller
{
    public function index()
    {
        return Inertia::render('Account', [
            'ads' => AdResource::collection(Ad::isOwner()
                                                ->with('media')
                                                ->select(['title', 'slug', 'price', 'district_id', 'category_id', 'created_at', 'id'])
                                                ->latest()
                                                ->get()),
            'states' => State::select(['id', 'name'])->get(),
            'bookmarked' => BookmarkResource::collection(Bookmark::where('user_id', auth()->id())->get()),
            'last_views' => BookmarkResource::collection(Like::where('user_id', auth()->id())->get()),
            'user' => auth()->user(),
        ]);
    }

    public function changeState(State $state): RedirectResponse
    {
        auth()->user()?->update(['state_id' => $state->id]);

        return back()
            ->with([
                       'type' => 'success',
                       'body' => 'ولایت شما تغییر یافت.',
                   ]);
    }
}
