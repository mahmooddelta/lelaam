<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use function response;

class ConversationsController extends Controller
{
    public function index()
    {

    }

    public function store(Request $request)
    {
    }

    public function show(Conversation $conversation)
    {
    }

    public function update(Request $request, Conversation $conversation)
    {
    }

    public function destroy(Conversation $conversation): JsonResponse
    {
        $conversation->messages()->each(fn($message) => $message->delete());

        return $conversation->delete() ? response()->json(['message' => '.گفتگو حذف شد']) : response()->json(['message' => '!حذف گفتگو ناموفق بود']);;
    }
}
