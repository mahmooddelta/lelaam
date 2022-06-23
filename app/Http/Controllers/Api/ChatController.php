<?php

namespace App\Http\Controllers\Api;

use App\Events\ConversationCreatedEvent;
use App\Events\MessageSentEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Chat\StoreRequest;
use App\Http\Resources\AdResource;
use App\Http\Resources\ConversationResource;
use App\Http\Resources\MessageResource;
use App\Models\Ad;
use App\Models\Conversation;
use App\Models\Message;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use function auth;
use function broadcast;
use function now;

class ChatController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return ConversationResource::collection(Conversation::query()
                                                    ->whereReceiverId(auth('api')->id())
                                                    ->orWhere('creator_id', auth('api')->id())
                                                    ->with(['ad', 'creator', 'receiver'])
                                                    ->latest()
                                                    ->get());
    }

    public function create(Ad $ad): JsonResponse
    {
        $ad->load('media');

        $conversation = Conversation::with(['creator', 'receiver'])->firstOrCreate(
            [
                'ad_id' => $ad->id,
            ],
            [
                'creator_id' => auth('api')->id(),
                'receiver_id' => $ad->user_id,
            ]);
        // Make the unread messages read
        Message::whereConversationId($conversation->id)
            ->whereHasSeen(false)
            ->update(['has_seen' => true, 'has_seen_at' => now()]);
        // Broadcast the event to channel
        broadcast(new ConversationCreatedEvent($conversation, $ad));

        $messages = $conversation->messages()->with(['sender', 'receiver'])->get();

        return \response()->json([
                                     'conversation' => new ConversationResource($conversation),
                                     'ad' => new AdResource($ad),
                                     'messages' => MessageResource::collection($messages),
                                 ]);
    }

    public function store(Ad $ad, StoreRequest $request): JsonResponse
    {
        $ad->load(['media'])->select(['id', 'title', 'slug', 'phone_number', 'user_id']);

        try {
            \DB::transaction(function () use ($request, $ad) {
                $message = Message::create(
                    [
                        'conversation_id' => $request->validated('conversation_id'),
                        'sender_id' => auth('api')->id(),
                        'receiver_id' => $ad->user_id,
                        'body' => $request->validated('message'),
                    ]);
                broadcast(new MessageSentEvent($message->conversation, $message))->toOthers();
            });
        } catch (Exception $exception) {
            \Log::error($exception);

            return \response()->json(['message' => 'مشکلی در ارسال پیام شما پیش آمده است. لطفا دوباره کوشش کنید!']);
        }

        return \response()->json(['message' => 'پیام ارسال شد.']);
    }

    public function destroy(Ad $ad): JsonResponse
    {
        return $ad->conversations()
            ->where(fn(Builder $query) => $query->orWhere('creator_id', auth('api')->id())
                ->orWhere('receiver_id', auth('api')->id()))
            ->delete() ? response()->json(['message' => 'تاریخچه چت حذف شد.']) : response()->json(['message' => 'حذف تاریخچه چت ناموفق بود!']);
    }
}
