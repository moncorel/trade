<?php

namespace App\Http\Controllers;

use App\Actions\Personal\Support\GetAllMessagesForMeAction;
use App\Actions\Personal\Support\SendMessageAction;
use App\Actions\Personal\Support\SendMessageRequest;
use App\Http\Requests\SendMessageFormRequest;
use Illuminate\Http\Request;

final class SupportController extends Controller
{
    private SendMessageAction $sendMessageAction;
    private GetAllMessagesForMeAction $getAllMessagesForMeAction;

    public function __construct(
        SendMessageAction $sendMessageAction,
        GetAllMessagesForMeAction $getAllMessagesForMeAction
    ) {
        $this->sendMessageAction = $sendMessageAction;
        $this->getAllMessagesForMeAction = $getAllMessagesForMeAction;
    }

    public function index()
    {
        $messages = $this->getAllMessagesForMeAction->execute()->getMessages();

        return view('personal.support', [
            'messages' => $messages
        ]);
    }

    public function sendMessage(SendMessageFormRequest $request)
    {
        $this->sendMessageAction->execute(
            new SendMessageRequest(
                $request->message
            )
        );

        return redirect(route('support'));
    }
}
