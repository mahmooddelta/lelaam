<?php

namespace App\Http\Controllers;

use App\Http\Resources\AdResource;
use App\Http\Resources\MessageResource;
use App\Models\Ad;
use App\Models\Message;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ChatController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Chat', [
            'ads' => AdResource::collection(Ad::whereHas('messages', function ($query) {
                return $query->where('receiver_id', auth()->id())
                    ->orWhere('sender_id', auth()->id());
            })->with(['messages', 'user', 'media'])->select(['id', 'title', 'slug', 'created_at'])->get()),
        ]);
    }

    public function create()
    {
        $ad = Ad::whereSlug(request('post'))->first();
        return Inertia::render('Chat/Create', [
            'ad' => new AdResource($ad),
            'messages' => MessageResource::collection(Message::whereAdId($ad->id)->where(function (Builder $query) {
                return $query->orWhere('receiver_id', auth()->id())
                    ->orWhere('sender_id', auth()->id());
            })->get()),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $ad = Ad::whereSlug($request->ad);
        Message::create([
            'ad_id' => $ad->value('id'),
            'sender_id' => auth()->id(),
            'receiver_id' => $ad->value('user_id'),
            'body' => $request->message,
        ]);
        return back()->with(['message' => 'پیام ارسال شد.']);
    }
}
