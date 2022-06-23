<?php

namespace App\Events;

use App\Http\Resources\ConversationResource;
use App\Http\Resources\MessageResource;
use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageSentEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(public Conversation $conversation, public Message $message)
    {
    }

    public function broadcastOn(): Channel
    {
        return new PrivateChannel('chat.'.$this->conversation->id);
    }

    public function broadcastWith()
    {
        return [
            'conversation' => ConversationResource::make($this->conversation->load(['ad', 'creator', 'receiver'])),
            'message' => MessageResource::make($this->message->load(['sender', 'receiver'])),
        ];
    }
}
