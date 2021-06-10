<?php

namespace App\Actions\Admin;

final class UpdateWalletsRequest
{
    private int $userId;
    private string $btcAddress;
    private string $ethAddress;
    private string $bchAddress;
    private float $btcAmount;
    private float $ethAmount;
    private float $bchAmount;

    public function __construct(
        int $userId,
        string $btcAddress,
        string $ethAddress,
        string $bchAddress,
        float $btcAmount,
        float $ethAmount,
        float $bchAmount
    ) {
        $this->userId = $userId;
        $this->btcAddress = $btcAddress;
        $this->ethAddress = $ethAddress;
        $this->bchAddress = $bchAddress;
        $this->btcAmount = $btcAmount;
        $this->ethAmount = $ethAmount;
        $this->bchAmount = $bchAmount;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getBtcAddress(): string
    {
        return $this->btcAddress;
    }

    public function getEthAddress(): string
    {
        return $this->ethAddress;
    }

    public function getBchAddress(): string
    {
        return $this->bchAddress;
    }

    public function getBtcAmount(): float
    {
        return $this->btcAmount;
    }

    public function getEthAmount(): float
    {
        return $this->ethAmount;
    }

    public function getBchAmount(): float
    {
        return $this->bchAmount;
    }
}
