<?php

namespace App\Repositories\Transaction;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Collection;

interface TransactionRepositoryInterface
{
    public function getDepositTransactions(): Collection;
    public function getWithdrawTransactions(): Collection;
    public function getAllTransactionsForUser(User $user): Collection;
    public function getAllMyTransaction(): Collection;
    public function save(Transaction $transaction): Transaction;
}
