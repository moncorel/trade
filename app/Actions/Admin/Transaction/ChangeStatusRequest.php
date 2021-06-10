<?php

namespace App\Actions\Admin\Transaction;

final class ChangeStatusRequest
{
    private string $status;
    private int $transactionId;

    public function __construct(
        string $status,
        int $transactionId
    ) {
        $this->status = $status;
        $this->transactionId = $transactionId;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getTransactionId(): int
    {
        return $this->transactionId;
    }
}
