<?php

namespace App\Actions\Admin\User;

final class SaveUserRequest
{
    private string $nickname;
    private string $email;
    private string $password;
    private float $btcAmount;
    private float $ethAmount;
    private float $bchAmount;

    public function __construct(
        string $nickname,
        string $email,
        string $password,
        float $btcAmount,
        float $ethAmount,
        float $bchAmount
    ) {
        $this->nickname = $nickname;
        $this->email = $email;
        $this->password = $password;
        $this->btcAmount = $btcAmount;
        $this->ethAmount = $ethAmount;
        $this->bchAmount = $bchAmount;
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

    public function getNickname(): string
    {
        return $this->nickname;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}
