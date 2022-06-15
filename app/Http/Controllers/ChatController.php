<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
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
        return Inertia::render('Chat', []);
    }

    public function create(): Response
    {
        Message::whereAdId(Ad::whereSlug(\request('post'))->value('id'))->where(function (Builder $query) {
            return $query->orWhere('receiver_id', auth()->id())
                ->orWhere('sender_id', auth()->id());
        })->update([
            'has_seen' => true,
        ]);
        return Inertia::render('Chat/Create', []);
    }

    public function store(Request $request): RedirectResponse
    {
        $ad = Ad::whereSlug($request->post);
        $message = Message::create([
            'ad_id' => $ad->value('id'),
            'sender_id' => auth()->id(),
            'receiver_id' => $ad->value('user_id'),
            'body' => $request->message,
        ]);
        broadcast(new MessageSent(auth()->user(), $message))->toOthers();
        return back()->with(['message' => 'پیام ارسال شد.']);
    }
}
