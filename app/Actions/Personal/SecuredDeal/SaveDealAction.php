<?php

namespace App\Actions\Personal\SecuredDeal;

use App\Models\SecuredDeal;
use App\Repositories\Wallet\WalletRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

final class SaveDealAction
{
    private WalletRepositoryInterface $walletRepository;

    public function __construct(
        WalletRepositoryInterface $walletRepository
    ) {
        $this->walletRepository = $walletRepository;
    }

    public function execute(SaveDealRequest $request)
    {
        $securedDeal = new SecuredDeal();
        $securedDeal->second_party_nickname = $request->getSecondPartyNickname();

        $securedDeal->conditions = $request->getDealConditions();
        $securedDeal->currency_type = $request->getCurrency();
        $securedDeal->deadline = $request->getDeadline();

        $myWallet = $this->walletRepository->myWallet($request->getCurrency());

        if ($myWallet->amount < $request->getAmount()) {
            throw ValidationException::withMessages([
                'amount' => "You don't have enough amount on your wallet"
            ]);
        }

        $securedDeal->amount = $request->getAmount();

        if ($request->getType() === SecuredDeal::SELLER_TYPE) {
            $request->seller_id = Auth::id();
        }

        if ($request->getType() === SecuredDeal::BUYER_TYPE) {
            $request->buyer_id = Auth::id();
            $securedDeal->password = $request->getPassword();
        }
        $securedDeal->save();
    }
}
