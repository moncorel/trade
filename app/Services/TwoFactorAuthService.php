<?php

namespace App\Services;

use App\Models\User;
use BotMan\Drivers\Telegram\TelegramDriver;

final class TwoFactorAuthService
{
    private $botman;
    public const CONFIRM_CODE = "Confirm code: ";
    public const DISABLE_CODE = "Code for disable Two Factor Authentication: ";

    public function __construct()
    {
        $this->botman = app('botman');
    }

    public function sendCodeToTelegram(User $user, string $message)
    {
        $code = $this->generateCode();
        $user->two_factor_code = $code;
        $user->save();
        $this->botman->say(
            $message . $code,
            $user->telegram_id,
            TelegramDriver::class
        );
    }

    private function generateCode()
    {
        return random_int(100000, 9999999);
    }
}
