<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

final class WithdrawHelper
{
    public static function getWithdrawals()
    {
        return DB::table('withdraw')->select('*')->where('user_id', '=', Auth::user()->id)->get();
    }
}
