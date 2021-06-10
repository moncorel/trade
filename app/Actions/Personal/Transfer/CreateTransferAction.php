<?php

namespace App\Actions\Personal\Transfer;

use App\Constants\TransactionConstants;
use App\Models\Transaction;
use App\Repositories\Transaction\TransactionRepositoryInterface;
use App\Repositories\Wallet\WalletRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

final class CreateTransferAction
{
    private WalletRepositoryInterface $walletRepository;
    private TransactionRepositoryInterface $transactionRepository;

    public function __construct(
        WalletRepositoryInterface $walletRepository,
        TransactionRepositoryInterface $transactionRepository
    ) {
        $this->walletRepository = $walletRepository;
        $this->transactionRepository = $transactionRepository;
    }

    public function execute(CreateTransferRequest $request)
    {
        if ($request->getAmount() < TransactionConstants::TRANSFER_MIN_AMOUNT) {
            throw ValidationException::withMessages([
                'amount' => "Amount can't be less than " . TransactionConstants::TRANSFER_MIN_AMOUNT
            ]);
        }

        $myWallet = $this->walletRepository->myWallet($request->getCurrencyType());

        $amountWithCommission = $request->getAmount() * (1 + TransactionConstants::TRANSFER_COMMISSION);

        if ($amountWithCommission > $myWallet->amount) {
            throw ValidationException::withMessages([
                'amount' => "You can't transfer more than you have!"
            ]);
        }

        $receiverWallet = $this->walletRepository->findWallet(
            $request->getCurrencyType(),
            $request->getAddress()
        );

        if (!$receiverWallet) {
            throw ValidationException::withMessages([
                "address" => "User with such wallet wasn't found!"
            ]);
        }

        $transaction = new Transaction();
        $transaction->type = Transaction::TRANSFER_TYPE;
        $transaction->amount = $request->getAmount();
        $transaction->with_commission = $amountWithCommission;
        $transaction->currency_type = $request->getCurrencyType();
        $transaction->sender_id = Auth::id();
        $transaction->receiver_id = $receiverWallet->owner->id;
        $transaction->status = Transaction::APPROVED_STATUS;
        $this->transactionRepository->save($transaction);

        $myWallet->amount -= $transaction->with_commission;
        $this->walletRepository->save($myWallet);

        $receiverWallet->amount += $transaction->amount;
        $this->walletRepository->save($receiverWallet);
    }
}
