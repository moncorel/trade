<?php

namespace App\Actions\Personal\Deposit;

final class CreateDepositRequest
{
    private float $amount;
    private string $currencyType;

    public function __construct(
        float $amount,
        string $currencyType
    ) {
        $this->amount = $amount;
        $this->currencyType = $currencyType;

    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function getCurrencyType(): string
    {
        return $this->currencyType;
    }
}
