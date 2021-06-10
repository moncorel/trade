<?php

namespace App\Services;

final class CryptoCurrencyConfig
{
    private const API_KEY = 'ecf74a034aa47bd65931f3580a64f6a7999a2f04596d752fcd1c923be8aded5a';
    private const API_URL = 'https://min-api.cryptocompare.com/data/price';

    public static function getApiKey()
    {
        return self::API_KEY;
    }

    public static function getApiUrl()
    {
        return self::API_URL;
    }
}

