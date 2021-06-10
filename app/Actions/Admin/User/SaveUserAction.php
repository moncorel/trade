<?php

namespace App\Actions\Admin\User;

use App\Models\User;
use App\Models\Wallet;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\Wallet\WalletRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

final class SaveUserAction
{
    private UserRepositoryInterface $userRepository;
    private WalletRepositoryInterface $walletRepository;

    public function __construct(
        UserRepositoryInterface $userRepository,
        WalletRepositoryInterface $walletRepository
    ) {
        $this->userRepository = $userRepository;
        $this->walletRepository = $walletRepository;
    }

    public function execute(SaveUserRequest $request)
    {
        $user = new User();
        $user->nickname = $request->getNickname();
        $user->email = $request->getEmail();
        $user->password = Hash::make($request->getPassword());
        $user = $this->userRepository->save($user);

        $btcWallet = new Wallet([
            'currency_type' => Wallet::BTC_TYPE,
            'amount' => $request->getBtcAmount(),
            'address' => Str::random(Wallet::ADDRESS_LENGTH),
            'owner_id' => $user->id
        ]);
        $this->walletRepository->save($btcWallet);

        $ethWallet = new Wallet([
            'currency_type' => Wallet::ETH_TYPE,
            'amount' => $request->getEthAmount(),
            'address' => Str::random(Wallet::ADDRESS_LENGTH),
            'owner_id' => $user->id
        ]);
        $this->walletRepository->save($ethWallet);

        $bchWallet = new Wallet([
            'currency_type' => Wallet::BCH_TYPE,
            'amount' => $request->getBchAmount(),
            'address' => Str::random(Wallet::ADDRESS_LENGTH),
            'owner_id' => $user->id
        ]);
        $this->walletRepository->save($bchWallet);
    }
}
