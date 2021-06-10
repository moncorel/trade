<?php

namespace App\Actions\Personal\Dashboard;

final class DashboardIndexResponse
{
    private float $btcCourseToUSD;
    private float $ethCourseToUSD;
    private float $bchCourseToUSD;
    private float $totalMoney;

    public function __construct(
        float $btcCourseToUSD,
        float $ethCourseToUSD,
        float $bchCourseToUSD,
        float $totalMoney
    ) {
        $this->btcCourseToUSD = $btcCourseToUSD;
        $this->ethCourseToUSD = $ethCourseToUSD;
        $this->bchCourseToUSD = $bchCourseToUSD;
        $this->totalMoney = $totalMoney;
    }

    public function getBtcCourseToUSD(): float
    {
        return $this->btcCourseToUSD;
    }

    public function getEthCourseToUSD(): float
    {
        return $this->ethCourseToUSD;
    }

    public function getBchCourseToUSD(): float
    {
        return $this->bchCourseToUSD;
    }

    public function getTotalMoney(): float
    {
        return $this->totalMoney;
    }
}
