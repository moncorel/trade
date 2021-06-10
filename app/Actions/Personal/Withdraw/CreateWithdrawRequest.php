<?php

namespace App\Actions\Personal\Withdraw;

final class CreateWithdrawRequest
{
    private float $amount;
    private string $currencyType;
    private string $externalAddress;

    public function __construct(
        float $amount,
        string $currencyType,
        string $externalAddress
    ) {
        $this->amount = $amount;
        $this->currencyType = $currencyType;
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

    public function getExternalAddress(): string
    {
        return $this->externalAddress;
    }
}
