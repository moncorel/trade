<?php

namespace App\Mail;

use App\Models\Message;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class SupportMessage extends Mailable
{
    use Queueable, SerializesModels;

    protected Message $message;
    protected $userFrom;

    public function __construct(Message $message)
    {
        $this->userFrom = Auth::user()->nickname;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.support')->with([
            'sentAt' => $this->message->created_at,
            'userFrom' => $this->userFrom,
            'text' => $this->message->message
        ]);
    }
}
