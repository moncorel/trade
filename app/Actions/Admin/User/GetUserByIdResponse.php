<?php

namespace App\Actions\Admin\User;

use App\Models\User;
use Illuminate\Support\Collection;

final class GetUserByIdResponse
{
    private User $user;
    private Collection $transactions;

    public function __construct(
        User $user,
        Collection $transactions
    ) {
        $this->user = $user;
        $this->transactions = $transactions;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function getTransactions(): Collection
    {
        return $this->transactions;
    }
}
