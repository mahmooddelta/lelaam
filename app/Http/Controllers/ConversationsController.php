<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use Illuminate\Http\RedirectResponse;
use function back;

class ConversationsController extends Controller
{
    public function destroy(Conversation $conversation): RedirectResponse
    {
        $conversation->messages()->each(fn($message) => $message->forceDelete());
        $conversation->delete();

        return back();
    }
}
