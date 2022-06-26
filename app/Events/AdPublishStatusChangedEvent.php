<?php

namespace App\Events;

use App\Http\Resources\AdResource;
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
        return new PrivateChannel('ad_publish_status_changed');
    }

    public function broadcastWith()
    {
        return [
            'message' => sprintf('.آگهی شما با عنوان "%s" بعد از بررسی مدیر سایت نشر شد. تشکر بابت استفاده از لیلام', $this->ad->title),
            'ad' => new AdResource($this->ad),
        ];
    }

    public function broadcastAs()
    {
        return 'AdPublishStatusChangedEvent';
    }
}
