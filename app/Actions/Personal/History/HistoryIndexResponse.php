<?php

namespace App\Actions\Personal\History;

use Illuminate\Support\Collection;

final class HistoryIndexResponse
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
