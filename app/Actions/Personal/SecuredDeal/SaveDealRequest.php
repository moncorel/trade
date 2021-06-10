<?php

namespace App\Actions\Personal\SecuredDeal;

final class SaveDealRequest
{
    private string $type;
    private string $secondPartyNickname;
    private string $dealConditions;
    private string $deadline;
    private string $currency;
    private float $amount;
    private ?string $password;

    public function __construct(
        string $type,
        string $secondPartyNickname,
        string $dealConditions,
        string $deadline,
        string $currency,
        float $amount,
        ?string $password
    ) {
        $this->type = $type;
        $this->secondPartyNickname = $secondPartyNickname;
        $this->dealConditions = $dealConditions;
        $this->deadline = $deadline;
        $this->currency = $currency;
        $this->amount = $amount;
        $this->password = $password;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getSecondPartyNickname(): string
    {
        return $this->secondPartyNickname;
    }

    public function getDealConditions(): string
    {
        return $this->dealConditions;
    }

    public function getDeadline(): string
    {
        return $this->deadline;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }
}
