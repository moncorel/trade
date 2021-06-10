<?php

namespace App\Actions\Personal\Withdraw;

use App\Constants\TransactionConstants;
use App\Models\Transaction;
use App\Repositories\Transaction\TransactionRepositoryInterface;
use App\Repositories\Wallet\WalletRepositoryInterface;
use Illuminate\Support\Facades\Auth;

final class CreateWithdrawAction
{
    private TransactionRepositoryInterface $transactionRepository;
    private WalletRepositoryInterface $walletRepository;

    public function __construct(
        TransactionRepositoryInterface $transactionRepository,
        WalletRepositoryInterface $walletRepository
    ) {
        $this->transactionRepository = $transactionRepository;
        $this->walletRepository = $walletRepository;
    }

    public function execute(CreateWithdrawRequest $request)
    {
        if ($request->getAmount() < TransactionConstants::DEPOSIT_MIN_AMOUNT) {
            return redirect(route('withdraw'))->withErrors([
                'amount' => "Amount can't be less than " . TransactionConstants::DEPOSIT_MIN_AMOUNT
            ]);
        }

        $myWallet = $this->walletRepository->myWallet($request->getCurrencyType());

        if ($request->getAmount() > $myWallet->amount) {
            return redirect(route('withdraw.create'))
                ->withErrors(['amount' => "Amount can't be more than your wallet amount!"]);
        }

        $transaction = new Transaction();
        $transaction->sender_id = Auth::id();
        $transaction->type = Transaction::WITHDRAW_TYPE;
        $transaction->external_address = $request->getExternalAddress();
        $transaction->amount = $request->getAmount();
        $transaction->currency_type = $request->getCurrencyType();
        $transaction = $this->transactionRepository->save($transaction);
    }
}
