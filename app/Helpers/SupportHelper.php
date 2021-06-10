<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

final class SupportHelper
{
    public static function sendMessage(array $data)
    {
        $user = Auth::user();

        DB::table('support')->insert([
            'from_user_id' => $user->id,
            'type' => $user->role,
            'message' => $data['message'],
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }

    public static function getMessages()
    {
        $user = Auth::user();

        $messagesFrom = DB::table('support')
            ->select('*')
            ->where('from_user_id', '=', $user->id)
            ->get()->toArray();

        $messagesTo = DB::table('support')
            ->select('*')
            ->where('to_user_id', '=', $user->id)
            ->get()->toArray();

        $messages = array_merge($messagesFrom, $messagesTo);

        usort($messages, function($one, $two) {
            return $two->created_at < $one->created_at;
        });

        return $messages;
    }
}
