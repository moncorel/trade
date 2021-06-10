<?php

namespace App\Actions\Personal\Deposit;

use Illuminate\Support\Collection;

final class DepositIndexResponse
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
