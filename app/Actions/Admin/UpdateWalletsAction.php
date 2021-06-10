<?php

namespace App\Actions\Admin;

use App\Models\Wallet;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\Wallet\WalletRepositoryInterface;
use Illuminate\Validation\ValidationException;

final class UpdateWalletsAction
{
    private WalletRepositoryInterface $walletRepository;
    private UserRepositoryInterface $userRepository;
    private bool $updated = false;

    public function __construct(
        WalletRepositoryInterface $walletRepository,
        UserRepositoryInterface $userRepository
    ) {
        $this->walletRepository = $walletRepository;
        $this->userRepository = $userRepository;
    }

    public function execute(UpdateWalletsRequest $request)
    {
        $user = $this->userRepository->getUserById($request->getUserId());

        if ($user->btcWallet->address !== $request->getBtcAddress()) {
            if ($this->walletRepository->getWalletByAddress($request->getBtcAddress())) {
                throw ValidationException::withMessages([
                    'btc_address' => "Wallet with such address already in use!"
                ]);
            }
            $user->btcWallet()->update([
                'address' => $request->getBtcAddress()
            ]);
            $this->updated = true;
        }
        if ($user->ethWallet->address !== $request->getEthAddress()) {
            if ($this->walletRepository->getWalletByAddress($request->getEthAddress())) {
                throw ValidationException::withMessages([
                    'btc_address' => "Wallet with such address already in use!"
                ]);
            }
            $user->ethWallet()->update([
                'address' => $request->getEthAddress()
            ]);
            $this->updated = true;
        }
        if ($user->bchWallet->address !== $request->getBchAddress()) {
            if ($this->walletRepository->getWalletByAddress($request->getBchAddress())) {
                throw ValidationException::withMessages([
                    'btc_address' => "Wallet with such address already in use!"
                ]);
            }
            $user->bchWallet()->update([
                'address' => $request->getBchAddress()
            ]);
            $this->updated = true;
        }
        if ($user->btcWallet->amount !== $request->getBtcAmount()) {
            $user->btcWallet()->update([
                'amount' => $request->getBtcAmount()
            ]);
            $this->updated = true;
        }

        if ($user->ethWallet->amount !== $request->getEthAmount()) {
            $user->ethWallet()->update([
                'amount' => $request->getEthAmount()
            ]);
            $this->updated = true;
        }

        if ($user->bchWallet->amount !== $request->getBchAmount()) {
            $user->bchWallet()->update([
                'amount' => $request->getBchAmount()
            ]);
            $this->updated = true;
        }

        return new UpdateWalletsResponse($this->updated);
    }
}
