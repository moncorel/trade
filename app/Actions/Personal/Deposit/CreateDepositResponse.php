<?php

namespace App\Actions\Personal\Deposit;

final class CreateDepositResponse
{
    private float $amount;
    private string $currencyType;
    private int $number;
    private string $externalAddress;

    public function __construct(
        float $amount,
        string $currencyType,
        int $number,
        string $externalAddress
    ) {
        $this->amount = $amount;
        $this->currencyType = $currencyType;
        $this->number = $number;
        $this->externalAddress = $externalAddress;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function getCurrencyType(): string
    {
        return $this->currencyType;
    }

    public function getNumber(): int
    {
        return $this->number;
    }

    public function getExternalAddress(): string
    {
        return $this->externalAddress;
    }
}
