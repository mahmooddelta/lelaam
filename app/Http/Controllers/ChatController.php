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

    public function create(Ad $ad, Conversation $conversation): Response|RedirectResponse
    {
        try {
            return DB::transaction(function () use ($ad, $conversation) {
                $ad->load('media');
                if (!$conversation->exists) {
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
                }

                // Make the unread messages read
                Message::whereConversationId($conversation->id)
                    ->whereHasSeen(false)
                    ->update(['has_seen' => true, 'has_seen_at' => now()]);
                // Broadcast the event to channel
                if ($conversation->wasRecentlyCreated || $conversation->wasChanged('updated_at')) {
                    broadcast(new ConversationCreatedEvent($conversation, $ad));
                }

                $messages = $conversation->messages()->withTrashed()->with(['sender', 'receiver'])->get();

                return Inertia::render('Chat/Create', [
                    'conversation' => new ConversationResource($conversation),
                    'ad' => new AdResource($ad),
                    'messages' => MessageResource::collection($messages),
                ]);
            });
        } catch (Exception $exception) {
            return back()->with([
                'type' => 'error',
                'body' => 'مشکلی در ایجاد گفتگوی شما پیش آمده است. لطفا دوباره کوشش کنید!',
            ]);
        }
    }

    public function store(StoreRequest $request, Ad $ad): RedirectResponse
    {
        $ad->load('media');

        try {
            return DB::transaction(function () use ($request, $ad) {
                $message = Message::create(
                    [
                        'conversation_id' => $request->validated('conversation_id'),
                        'sender_id' => auth()->id(),
                        'receiver_id' => $ad->user_id,
                        'body' => $request->validated('message'),
                    ]);
                broadcast(new MessageSentEvent($message->conversation, $message))->toOthers();
                return back()->with(['message' => 'پیام ارسال شد.']);
            });
        } catch (Exception $exception) {
            Log::error($exception);

            return back()
                ->with([
                    'type' => 'error',
                    'body' => 'مشکلی در ارسال پیام شما پیش آمده است. لطفا دوباره کوشش کنید!',
                ]);
        }
    }

    public function destroy(Message $message): RedirectResponse
    {
        if ($message->sender_id !== auth()->id()) {
            return back()
                ->with([
                    'type' => 'error',
                    'body' => 'حذف پیامی که توسط شما فرستاده نشده است مجاز نیست!',
                ]);
        }

        $message->delete();

        return back();
    }
}
