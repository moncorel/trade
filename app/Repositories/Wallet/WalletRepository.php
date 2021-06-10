<?php

namespace App\Repositories\Wallet;

use App\Models\Wallet;
use Illuminate\Support\Facades\Auth;

final class WalletRepository implements WalletRepositoryInterface
{
    public function myWallet(string $walletType)
    {
        $userId = Auth::id();

        return Wallet::where('owner_id', '=', $userId)
            ->where('currency_type', '=', $walletType)
            ->first();
    }

    public function getWalletByAddress(string $address)
    {
        return Wallet::where('address', '=', $address)->first();
    }

    public function findWallet(string $currencyType, string $address): ?Wallet
    {
        return Wallet::where('currency_type', '=', $currencyType)
            ->where('address', '=', $address)->first();
    }

    public function save(Wallet $wallet): Wallet
    {
        $wallet->save();
        return $wallet;
    }

    public function getWalletByUserIdAndCurrType(int $userId, string $currencyType): ?Wallet
    {
        return Wallet::where('owner_id', $userId)->where('currency_type', $currencyType)->first();
    }
}
