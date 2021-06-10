<?php

namespace App\Repositories\Wallet;

use App\Models\Wallet;

interface WalletRepositoryInterface
{
    public function myWallet(string $walletType);
    public function findWallet(string $currencyType, string $address): ?Wallet;
    public function save(Wallet $wallet): Wallet;
    public function getWalletByAddress(string $address);
    public function getWalletByUserIdAndCurrType(int $userId, string $currencyType): ?Wallet;
}
