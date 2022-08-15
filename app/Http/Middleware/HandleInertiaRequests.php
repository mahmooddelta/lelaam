<?php

namespace App\Http\Middleware;

use App\Models\Message;
use Config;
use Illuminate\Http\Request;
use Inertia\Middleware;
use Tightenco\Ziggy\Ziggy;
use function auth;

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
     * @param  \Illuminate\Http\Request  $request
     *
     * @return string|null
     */
    public function version(Request $request)
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return array
     */
    public function share(Request $request): array
    {
        return array_merge(parent::share($request), [
            'ziggy' => function() {
                return (new Ziggy)->toArray();
            },

            'can' => [

            ],

            'flash' => function() use ($request) {
                return [
                    'type' => $request->session()->get('type'),
                    'body' => $request->session()->get('body'),
                ];
            },

            'unread_messages_count' => Message::query()
                ->whereReceiverId(auth()->id())
                ->orWhere('sender_id', auth()->id())
                ->whereHasSeen(false)
                ->count(),
            'social_media_links' => [
                'youtube' => Config::get('settings.website_youtube_link'),
                'instagram' => Config::get('settings.website_instagram_link'),
                'facebook' => Config::get('settings.website_facebook_link'),
                'tiktok' => Config::get('settings.website_tiktok_link'),
            ],
        ]);
    }
}
