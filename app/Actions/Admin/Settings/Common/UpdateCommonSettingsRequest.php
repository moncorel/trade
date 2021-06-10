<?php

namespace App\Actions\Admin\Settings\Common;

use Illuminate\Http\UploadedFile;

final class UpdateCommonSettingsRequest
{
    private ?UploadedFile $logotype;
    private string $address;
    private string $email;
    private string $withdrawMessage;
    private string $tradingMessage;
    private float $minDepositAmount;
    private float $minWithdrawAmount;
    private float $minTransferAmount;
    private float $transferCommission;
    private string $securedDealWarning;
    private string $contactUsHeader;
    private string $contactUsText;
    private string $paymentHeader;
    private string $paymentText;

    public function __construct(
        ?UploadedFile $logotype,
        string $address,
        string $email,
        string $withdrawMessage,
        string $tradingMessage,
        float $minDepositAmount,
        float $minWithdrawAmount,
        float $minTransferAmount,
        float $transferCommission,
        string $securedDealWarning,
        string $contactUsHeader,
        string $contactUsText,
        string $paymentHeader,
        string $paymentText
    ) {
        $this->logotype = $logotype;
        $this->address = $address;
        $this->email = $email;
        $this->withdrawMessage = $withdrawMessage;
        $this->tradingMessage = $tradingMessage;
        $this->minDepositAmount = $minDepositAmount;
        $this->minWithdrawAmount = $minWithdrawAmount;
        $this->minTransferAmount = $minTransferAmount;
        $this->transferCommission = $transferCommission;
        $this->securedDealWarning = $securedDealWarning;
        $this->contactUsHeader = $contactUsHeader;
        $this->contactUsText = $contactUsText;
        $this->paymentHeader = $paymentHeader;
        $this->paymentText = $paymentText;
    }

    public function getContactUsHeader(): string
    {
        return $this->contactUsHeader;
    }

    public function getContactUsText(): string
    {
        return $this->contactUsText;
    }

    public function getPaymentHeader(): string
    {
        return $this->paymentHeader;
    }

    public function getPaymentText(): string
    {
        return $this->paymentText;
    }

    public function getLogotype(): ?UploadedFile
    {
        return $this->logotype;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getWithdrawMessage(): string
    {
        return $this->withdrawMessage;
    }

    public function getTradingMessage(): string
    {
        return $this->tradingMessage;
    }

    public function getMinDepositAmount(): float
    {
        return $this->minDepositAmount;
    }

    public function getMinWithdrawAmount(): float
    {
        return $this->minWithdrawAmount;
    }

    public function getMinTransferAmount(): float
    {
        return $this->minTransferAmount;
    }

    public function getTransferCommission(): float
    {
        return $this->transferCommission;
    }

    public function getSecuredDealWarning(): string
    {
        return $this->securedDealWarning;
    }
}
