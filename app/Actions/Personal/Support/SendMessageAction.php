<?php

namespace App\Actions\Personal\Support;

use App\Mail\SupportMessage;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

final class SendMessageAction
{
    public function execute(SendMessageRequest $request)
    {
        $message = new Message();
        $message->message = $request->getMessage();
        $message->type = Message::SUPPORT_TYPE;
        $message->sender_id = Auth::id();
        $message->save();

        Mail::to(env('MAIL_TO'))->send(new SupportMessage($message));
    }
}
