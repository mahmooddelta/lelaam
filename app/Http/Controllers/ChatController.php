<?php

namespace App\Http\Controllers;

use App\Events\ConversationCreatedEvent;
use App\Events\MessageSentEvent;
use App\Http\Requests\Chat\StoreRequest;
use App\Http\Resources\AdResource;
use App\Http\Resources\ConversationResource;
use App\Http\Resources\MessageResource;
use App\Models\Ad;
use App\Models\Conversation;
use App\Models\Message;
use DB;
use Exception;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;
use Log;
use function auth;
use function back;
use function broadcast;
use function now;

class ChatController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Chat', [
            'conversations' => ConversationResource::collection(Conversation::whereReceiverId(auth()->id())
                ->orWhere('creator_id', auth()->id())
                ->with('ad')
                ->latest()
                ->get()),
        ]);
    }

    public function create(Ad $ad): Response
    {
        $ad->load('media');

        $conversation = Conversation::query()
            ->whereReceiverId(auth()->id())
            ->orWhere('creator_id', auth()->id())
            ->with(['creator', 'receiver'])
            ->firstOrCreate(
                [
                    'ad_id' => $ad->id,
                ],
                [
                    'creator_id' => auth()->id(),
                    'receiver_id' => $ad->user_id,
                ]);

        // Make the unread messages read
        Message::whereConversationId($conversation->id)
            ->whereHasSeen(false)
            ->update(['has_seen' => true, 'has_seen_at' => now()]);
        // Broadcast the event to channel
        if ($conversation->wasRecentlyCreated) {
            broadcast(new ConversationCreatedEvent($conversation, $ad));
        }

        $messages = $conversation->messages()->withTrashed()->with(['sender', 'receiver'])->get();

        return Inertia::render('Chat/Create', [
            'conversation' => new ConversationResource($conversation),
            'ad' => new AdResource($ad),
            'messages' => MessageResource::collection($messages),
        ]);
    }

    public function store(StoreRequest $request, Ad $ad): RedirectResponse
    {
        $ad->load('media');

        try {
            DB::transaction(function() use ($request, $ad) {
                $message = Message::create(
                    [
                        'conversation_id' => $request->validated('conversation_id'),
                        'sender_id' => auth()->id(),
                        'receiver_id' => $ad->user_id,
                        'body' => $request->validated('message'),
                    ]);
                broadcast(new MessageSentEvent($message->conversation, $message))->toOthers();
            });
        } catch (Exception $exception) {
            Log::error($exception);

            return back()
                ->with([
                    'type' => 'error',
                    'body', 'مشکلی در ارسال پیام شما پیش آمده است. لطفا دوباره کوشش کنید!',
                ]);
        }

        return back()->with(['message' => 'پیام ارسال شد.']);
    }

    public function destroy(Message $message): RedirectResponse
    {
        $message->delete();

        return back();
    }
}
