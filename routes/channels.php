<?php

use App\Models\Conversation;
use App\Models\User;
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

Broadcast::channel('published.{creator}', fn($user, User $creator) => (int)$user->id === (int)$creator->id);

Broadcast::channel('conversation', fn($user) => auth()->check() && (int)$user->id === (int)auth()->id());

Broadcast::channel('chat.{conversation}', fn($user, Conversation $conversation) => auth()->check() && (int)$user->id == ((int)$conversation->creator_id || (int)$conversation->receiver_id));
