<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Conversation;
use Illuminate\Http\JsonResponse;
use function response;

class ConversationsController extends Controller
{
    public function destroy(Conversation $conversation): JsonResponse
    {
        $conversation->messages()->each(fn($message) => $message->forceDelete());

        return $conversation->delete() ? response()->json(['message' => '.گفتگو حذف شد']) : response()->json(['message' => '!حذف گفتگو ناموفق بود']);;
    }
}
