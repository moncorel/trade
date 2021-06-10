<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

final class CryptoCurrencyCourse
{
    public function getBTCCourseToUsd()
    {
        $url = CryptoCurrencyConfig::getApiUrl() .
            '?fsym=BTC&tsyms=USD&api_key=' .
            CryptoCurrencyConfig::getApiKey();

        $response = Http::get($url)->json();
        return $response['USD'];
    }

    public function getBCHCourseToUsd()
    {
        $url = CryptoCurrencyConfig::getApiUrl() .
            '?fsym=BCH&tsyms=USD&api_key=' .
            CryptoCurrencyConfig::getApiKey();

        $response = Http::get($url)->json();
        return $response['USD'];
    }

    public function getETHCourseToUsd()
    {
        $url = CryptoCurrencyConfig::getApiUrl() .
            '?fsym=ETH&tsyms=USD&api_key=' .
            CryptoCurrencyConfig::getApiKey();

        $response = Http::get($url)->json();
        return $response['USD'];
    }
}
