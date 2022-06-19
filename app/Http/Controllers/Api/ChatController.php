<?php

namespace App\Http\Controllers\Api;

use App\Events\MessageSent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Chat\StoreRequest;
use App\Http\Resources\AdResource;
use App\Http\Resources\MessageResource;
use App\Http\Resources\UserResource;
use App\Models\Ad;
use App\Models\Message;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Log;

class ChatController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return AdResource::collection(Ad::query()
            ->whereHas('messages', function ($query) {
                return $query->where('receiver_id', auth()->id())
                    ->orWhere('sender_id', auth()->id());
            })
            ->with([
                'messages',
                'user',
                'media'
            ])
            ->select(['id', 'title', 'slug', 'created_at'])
            ->get());
    }

    public function create(Ad $ad): JsonResponse
    {
        Message::whereAdId(Ad::whereSlug(\request('post'))->value('id'))->where(function (Builder $query) {
            return $query->orWhere('receiver_id', auth()->id())
                ->orWhere('sender_id', auth()->id());
        })->update([
            'has_seen' => true,
        ]);

        return \response()->json([
            'ad' => new AdResource($ad),
            'messages' => MessageResource::collection($ad->messages()
                ->where(fn(Builder $query) => $query->orWhere('sender_id', auth()->id())->orWhere('receiver_id', $ad->user_id))
                ->get()),
        ]);
    }

    public function store(Ad $ad, StoreRequest $request): JsonResponse
    {
        $ad->load(['media'])->select(['id', 'title', 'slug', 'phone_number', 'user_id']);
        try {
            $message = Message::create([
                'ad_id' => $ad->value('id'),
                'sender_id' => auth()->id(),
                'receiver_id' => $ad->value('user_id'),
                'body' => $request->validated('message'),
            ]);
            broadcast(new MessageSent(UserResource::make(auth()->user()), MessageResource::make($message), AdResource::make($ad)))->toOthers();
        } catch (Exception $exception) {
            Log::error($exception);
            return \response()->json(['message' => 'مشکلی در ارسال پیام شما پیش آمده است. لطفا دوباره کوشش کنید!']);
        }
        return \response()->json(['message' => 'پیام ارسال شد.']);
    }

    public function destroy(Ad $ad): JsonResponse
    {
        return $ad->messages()->delete() ? response()->json(['message' => 'تاریخچه چت حذف شد.']) : response()->json(['message' => 'حذف تاریخچه چت ناموفق بود!']);
    }
}
