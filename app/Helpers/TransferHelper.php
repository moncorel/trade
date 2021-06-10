<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

final class TransferHelper
{
    public static function getSenderWallet($senderId, string $currency)
    {
        $table = $currency . '_wallets';
        $column = $currency . '_wallet_id';

        $walletId = DB::table('users')
            ->select($column)
            ->where('id', '=', $senderId)
            ->get()[0]
            ->$column;


        return DB::table($table)
            ->select('*')
            ->where('id', $walletId)
            ->get()[0];
    }

    public static function getReceiverWalletIfExists($address, string $currency)
    {
        $table = $currency . '_wallets';
        $wallet = DB::table($table)
            ->select('*')
            ->where('address', '=', $address)
            ->get();

        if ($wallet->count()) {
            return $wallet[0];
        }

        return false;
    }

    public static function getReceiver($walletId, string $currency)
    {
        $column = $currency . '_wallet_id';
        $user = DB::table('users')
            ->select('*')
            ->where($column, '=', $walletId)
            ->get();

        if ($user->count()) {
            return $user[0];
        }

        return false;
    }

    public static function makeTransfer($sender, $receiver, $senderWallet, $receiverWallet, $transferData)
    {
        DB::table('transfer')->insert([
            'sender_id' => $sender->id,
            'receiver_id' => $receiver->id,
            'sender_address' => $senderWallet->address,
            'receiver_address' => $receiverWallet->address,
            'currency' => $transferData['currency'],
            'amount' => $transferData['amount'],
            'with_commission' => $transferData['with_commission'],
            'created_at' => $transferData['created_at']
        ]);
        $table = $transferData['currency'] . '_wallets';
        $commission = $transferData['with_commission'] - $transferData['amount'];

        $senderWallet->amount -= $transferData['with_commission'];
        DB::table($table)
            ->where('address', '=', $senderWallet->address)
            ->update(['amount' => $senderWallet->amount]);

        $receiverWallet->amount += $transferData['amount'];
        DB::table($table)
            ->where('address', '=', $receiverWallet->address)
            ->update(['amount' => $receiverWallet->amount]);

        $column = $transferData['currency'] . '_wallet_id';


        $ownerWalletId = DB::table('users')
            ->select($column)
            ->where('role', '=', 'owner')
            ->get()[0]
            ->$column;

        $ownerWallet = DB::table($table)
            ->select('*')
            ->where('id', '=', $ownerWalletId)
            ->get()[0];

        $ownerWallet->amount += $commission;
        DB::table($table)
            ->where('address', '=', $ownerWallet->address)
            ->update(['amount' => $ownerWallet->amount]);
    }
}
