<?php

namespace App\Actions\Admin\Transaction;

final class ChangeStatusResponse
{
    private string $updatedStatus;

    public function __construct(string $updatedStatus)
    {
        $this->updatedStatus = $updatedStatus;
    }

    public function getUpdatedStatus(): string
    {
        return $this->updatedStatus;
    }
}
