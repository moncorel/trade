<?php

namespace App\Repositories\Transaction;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class TransactionRepository implements TransactionRepositoryInterface
{
    public const DEFAULT_SORTING = 'id';
    public const DEFAULT_DIRECTION = 'desc';

    public function getDepositTransactions(): Collection
    {
        return Transaction::where('type', '=', Transaction::DEPOSIT_TYPE)
            ->where('sender_id', '=', Auth::id())
            ->orderBy(self::DEFAULT_SORTING, self::DEFAULT_DIRECTION)->get();
    }

    public function getWithdrawTransactions(): Collection
    {
        return Transaction::where('type', '=', Transaction::WITHDRAW_TYPE)
            ->where('sender_id', '=', Auth::id())
            ->orderBy(self::DEFAULT_SORTING, self::DEFAULT_DIRECTION)->get();
    }

    public function getAllTransactionsForUser(User $user): Collection
    {
        return Transaction::where('sender_id', $user->id)
            ->orWhere('receiver_id', $user->id)->orderBy('id', 'desc')->get();
    }

    public function getAllMyTransaction(): Collection
    {
        return Transaction::where('sender_id', '=', Auth::id())
            ->orWhere('receiver_id', '=', Auth::id())
            ->orderBy(self::DEFAULT_SORTING, self::DEFAULT_DIRECTION)
            ->get();
    }

    public function save(Transaction $transaction): Transaction
    {
        $transaction->save();
        return $transaction;
    }
}
