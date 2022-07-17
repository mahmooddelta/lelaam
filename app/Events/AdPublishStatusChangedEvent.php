<?php

namespace App\Events;

use App\Http\Resources\AdResource;
use App\Http\Resources\UserResource;
use App\Models\Ad;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use function sprintf;

class AdPublishStatusChangedEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(public Ad $ad)
    {
    }

    public function broadcastOn(): Channel
    {
        return new PrivateChannel('published.'.$this->ad->user_id);
    }

    public function broadcastWith(): array
    {
        return [
            'message' => sprintf('.آگهی شما با عنوان "%s" بعد از بررسی مدیر سایت نشر شد. تشکر بابت استفاده از لیلام', $this->ad->title),
            'ad' => new AdResource($this->ad),
            'user' => $this->ad->user_id !== 0 ? new UserResource($this->ad->user) : null,
        ];
    }

    public function broadcastAs(): string
    {
        return 'AdPublishStatusChangedEvent';
    }
}
