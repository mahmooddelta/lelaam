<?php

use App\Models\Conversation;
use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
Broadcast::channel('conversation', function ($user) {
    return auth()->check() && (int) $user->id === (int) auth()->id();
});
Broadcast::channel('chat.{conversation}', fn($user, Conversation $conversation) => auth()->check() && (int) $user->id == ((int) $conversation->creator_id || (int) $conversation->receiver_id));
