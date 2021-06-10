<?php

$botman = app('botman');

$botman->hears('/activate ([0-9]+)', function ($bot, $code) {
    $user = \App\Models\User::where('two_factor_code', '=', $code)->first();

    $bot->typesAndWaits(2);

    if (!$user) {
        $bot->reply('Two Factor Authentication code is wrong!');
    } else {
        $user->two_factor_active = true;
        $user->two_factor_code = null;
        $user->telegram_id = $bot->getUser()->getId();
        $user->save();
        $bot->reply('Two Factor Authentication successfully activated!');
    }
});

$botman->hears('test', function ($bot) {
   $bot->reply('Hello!');
});
