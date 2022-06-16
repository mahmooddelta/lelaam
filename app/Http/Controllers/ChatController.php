<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Http\Resources\AdResource;
use App\Http\Resources\MessageResource;
use App\Http\Resources\UserResource;
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
            'ads' => AdResource::collection(Ad::query()
                ->whereHas('messages', function ($query) {
                    return $query->where('receiver_id', auth()->id())
                        ->orWhere('sender_id', auth()->id());
                })
                ->with([
                    'messages',
                    'user',
                    'media'
                ])
                ->select(['id', 'title', 'slug', 'created_at'])
                ->get())
        ]);
    }

    public function create(): Response
    {
        Message::whereAdId(Ad::whereSlug(\request('post'))->value('id'))->where(function (Builder $query) {
            return $query->orWhere('receiver_id', auth()->id())
                ->orWhere('sender_id', auth()->id());
        })->update([
            'has_seen' => true,
        ]);

        $ad = Ad::whereSlug(request('post'))->first();

        return Inertia::render('Chat/Create', [
            'ad' => new AdResource($ad),
            'messages' => MessageResource::collection($ad->messages()
                ->where(fn(Builder $query) => $query->orWhere('sender_id', auth()->id())->orWhere('receiver_id', $ad->user_id))
                ->get()),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $ad = Ad::whereSlug($request->post)->with(['media'])->select(['id', 'title', 'slug', 'phone_number', 'user_id']);
        $message = Message::create([
            'ad_id' => $ad->value('id'),
            'sender_id' => auth()->id(),
            'receiver_id' => $ad->value('user_id'),
            'body' => $request->message,
        ]);
        broadcast(new MessageSent(UserResource::make(auth()->user()), MessageResource::make($message), AdResource::make($ad->first())))->toOthers();
        return back()->with(['message' => 'پیام ارسال شد.']);
    }
}
