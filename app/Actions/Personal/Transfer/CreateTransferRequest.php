<?php

namespace App\Actions\Personal\Transfer;

final class CreateTransferRequest
{
    private float $amount;
    private string $address;
    private string $currencyType;

    public function __construct(
        float $amount,
        string $address,
        string $currencyType
    ) {
        $this->amount = $amount;
        $this->address = $address;
        $this->currencyType = $currencyType;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function getCurrencyType(): string
    {
        return $this->currencyType;
    }
}
