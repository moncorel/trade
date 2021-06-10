<?php

namespace App\Actions\Admin\Transaction;

final class UpdateTransactionRequest
{
    private int $transactionId;
    private float $amount;
    private string $status;
    private string $createdAt;
    private ?float $withCommission;

    public function __construct(
        int $transactionId,
        float $amount,
        string $status,
        string $createdAt,
        ?float $withCommission
    ) {
        $this->transactionId = $transactionId;
        $this->amount = $amount;
        $this->status = $status;
        $this->createdAt = $createdAt;
        $this->withCommission = $withCommission;
    }

    public function getTransactionId(): int
    {
        return $this->transactionId;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    public function getWithCommission(): ?float
    {
        return $this->withCommission;
    }
}
