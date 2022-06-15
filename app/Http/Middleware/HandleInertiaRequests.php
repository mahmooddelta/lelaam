<?php

namespace App\Http\Middleware;

use App\Http\Resources\AdResource;
use App\Http\Resources\MessageResource;
use App\Models\Ad;
use App\Models\Message;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Inertia\Middleware;
use Tightenco\Ziggy\Ziggy;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     *
     * @param \Illuminate\Http\Request $request
     * @return string|null
     */
    public function version(Request $request)
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function share(Request $request)
    {
        return array_merge(parent::share($request), [
            'ziggy' => function () {
                return (new Ziggy)->toArray();
            },
            'can' => [

            ],
            'flash' => function () use ($request) {
                return [
                    'type' => $request->session()->get('type'),
                    'body' => $request->session()->get('body'),
                ];
            },
            'ads_messages' => AdResource::collection(Ad::whereHas('messages', function ($query) {
                return $query->where('receiver_id', auth()->id())
                    ->orWhere('sender_id', auth()->id());
            })->with(['messages', 'user', 'media'])->select(['id', 'title', 'slug', 'created_at'])->withCount(['messages' => fn(Builder $query) => $query->where('has_seen', false)])->get()),

            'unread_messages_count' => Message::whereReceiverId(auth()->id())->whereHasSeen(false)->count(),

            'ad' => $request->has('post') ? fn() => new AdResource(Ad::whereSlug($request->post)->first()) : null,

            'messages' => $request->has('post') ? fn() => MessageResource::collection(Message::whereAdId(Ad::whereSlug($request->post)->value('id'))->where(function (Builder $query) {
                return $query->orWhere('receiver_id', auth()->id())
                    ->orWhere('sender_id', auth()->id());
            })->get()) : null,
        ]);
    }
}
