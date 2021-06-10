<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

final class DepositHelper
{
    public static function getDepositTransactions()
    {
        return DB::table('transactions')
            ->select('*')
            ->where('user_id', '=', Auth::user()->id)
            ->where('type', '=', 'deposit')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public static function getNumberOfDepositRequest()
    {
        return count(DB::table('transactions')->select('*')->get()->toArray()) + 1;
    }

    public static function createDepositRequest(array $data)
    {
        $created_at = date('Y-m-d-H:i:s');
        DB::table('transactions')
            ->insert([
                'user_key' => $data['user_key'],
                'user_id' => $data['user_id'],
                'amount' => $data['amount'],
                'type' => $data['type'],
                'currency' => $data['currency'],
                'address' => $data['address'],
                'owner_address' => $data['owner_address'],
                'created_at' => $created_at
            ]);
    }
}
