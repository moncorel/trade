<?php

namespace App\Actions\Personal\Dashboard;

use App\Models\Wallet;
use App\Repositories\Wallet\WalletRepositoryInterface;
use App\Services\CryptoCurrencyCourse;

final class DashboardIndexAction
{
    private WalletRepositoryInterface $walletRepository;
    private CryptoCurrencyCourse $cryptoApi;

    public function __construct(
        CryptoCurrencyCourse $cryptoApi,
        WalletRepositoryInterface $walletRepository
    ) {
        $this->cryptoApi = $cryptoApi;
        $this->walletRepository = $walletRepository;
    }

    public function execute(): DashboardIndexResponse
    {
        $btcCourseToUsd = $this->cryptoApi->getBTCCourseToUsd();
        $bchCourseToUsd = $this->cryptoApi->getBCHCourseToUsd();
        $ethCourseToUsd = $this->cryptoApi->getETHCourseToUsd();

        $btcWallet = $this->walletRepository->myWallet(Wallet::BTC_TYPE);
        $ethWallet = $this->walletRepository->myWallet(Wallet::ETH_TYPE);
        $bchWallet = $this->walletRepository->myWallet(Wallet::BCH_TYPE);

        $totalMoney = round(
            $btcWallet->amount * $btcCourseToUsd +
            $bchWallet->amount * $bchCourseToUsd +
            $ethWallet->amount * $ethCourseToUsd,
            3
        );

        return new DashboardIndexResponse(
            $btcCourseToUsd,
            $ethCourseToUsd,
            $bchCourseToUsd,
            $totalMoney
        );
    }
}
