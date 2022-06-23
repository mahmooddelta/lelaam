<?php

namespace App\Events;

use App\Http\Resources\ConversationResource;
use App\Models\Ad;
use App\Models\Conversation;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ConversationCreatedEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(public Conversation $conversation, public Ad $ad)
    {
    }

    public function broadcastOn(): Channel
    {
        return new PrivateChannel('conversation');
    }

    public function broadcastWith()
    {
        return [
            'conversation' => ConversationResource::make($this->conversation->load('ad')),
        ];
    }
}
