<?php

namespace App\Actions\Personal\Support;

use App\Models\Message;
use Illuminate\Support\Facades\Auth;

final class GetAllMessagesForMeAction
{
    public function execute(): GetAllMessagesForMeResponse
    {
        $messages = Message::where('type', '=', Message::SUPPORT_TYPE)
            ->where('sender_id', '=', Auth::id())->orWhere('receiver_id', '=', Auth::id())->get();

        return new GetAllMessagesForMeResponse($messages);
    }
}
