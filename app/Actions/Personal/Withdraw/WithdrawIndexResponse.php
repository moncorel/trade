<?php

namespace App\Actions\Personal\Withdraw;

use Illuminate\Support\Collection;

final class WithdrawIndexResponse
{
    private Collection $transactions;

    public function __construct(Collection $transactions)
    {
        $this->transactions = $transactions;
    }

    public function getTransactions(): Collection
    {
        return $this->transactions;
    }
}
