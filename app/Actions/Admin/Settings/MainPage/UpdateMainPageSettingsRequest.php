<?php

namespace App\Actions\Admin\Settings\MainPage;

final class UpdateMainPageSettingsRequest
{
    private string $welcomeHeader;
    private string $welcomeDescription;
    private string $protectionAdvantage;
    private string $safetyAdvantage;
    private string $supportAdvantage;
    private string $stabilityAdvantage;
    private string $securedDealDescription;
    private string $tradingDescription;

    public function __construct(
        string $welcomeHeader,
        string $welcomeDescription,
        string $protectionAdvantage,
        string $safetyAdvantage,
        string $supportAdvantage,
        string $stabilityAdvantage,
        string $securedDealDescription,
        string $tradingDescription
    ) {
        $this->welcomeHeader = $welcomeHeader;
        $this->welcomeDescription = $welcomeDescription;
        $this->protectionAdvantage = $protectionAdvantage;
        $this->safetyAdvantage = $safetyAdvantage;
        $this->supportAdvantage = $supportAdvantage;
        $this->stabilityAdvantage = $stabilityAdvantage;
        $this->securedDealDescription = $securedDealDescription;
        $this->tradingDescription = $tradingDescription;
    }

    public function getWelcomeHeader(): string
    {
        return $this->welcomeHeader;
    }

    public function getWelcomeDescription(): string
    {
        return $this->welcomeDescription;
    }

    public function getProtectionAdvantage(): string
    {
        return $this->protectionAdvantage;
    }

    public function getSafetyAdvantage(): string
    {
        return $this->safetyAdvantage;
    }

    public function getSupportAdvantage(): string
    {
        return $this->supportAdvantage;
    }

    public function getStabilityAdvantage(): string
    {
        return $this->stabilityAdvantage;
    }

    public function getSecuredDealDescription(): string
    {
        return $this->securedDealDescription;
    }

    public function getTradingDescription(): string
    {
        return $this->tradingDescription;
    }
}
