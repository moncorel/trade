<?php

namespace App\Actions\Admin\Transaction;

final class AddTransactionRequest
{
    private float $amount;
    private string $type;
    private string $currencyType;
    private ?string $senderNickname;
    private ?string $receiverNickname;
    private ?string $externalAddress;

    public function __construct(
        float $amount,
        string $type,
        string $currencyType,
        ?string $senderNickname,
        ?string $receiverNickname,
        ?string $externalAddress
    ) {
        $this->amount = $amount;
        $this->type = $type;
        $this->currencyType = $currencyType;
        $this->senderNickname = $senderNickname;
        $this->receiverNickname = $receiverNickname;
        $this->externalAddress = $externalAddress;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getCurrencyType(): string
    {
        return $this->currencyType;
    }

    public function getSenderNickname(): ?string
    {
        return $this->senderNickname;
    }

    public function getReceiverNickname(): ?string
    {
        return $this->receiverNickname;
    }

    public function getExternalAddress(): ?string
    {
        return $this->externalAddress;
    }
}
