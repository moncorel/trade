<?php

namespace App\Actions\Admin\Transaction;

use App\Models\Transaction;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\Wallet\WalletRepositoryInterface;
use Illuminate\Validation\ValidationException;

final class UpdateTransactionAction
{
    private WalletRepositoryInterface $walletRepository;

    public function __construct(
        WalletRepositoryInterface $walletRepository
    ) {
        $this->walletRepository = $walletRepository;
    }

    public function execute(UpdateTransactionRequest $request)
    {
        $transaction = Transaction::findOrFail($request->getTransactionId());
//        $transaction->status = $request->getStatus();
        $transaction->amount = $request->getAmount();
        $transaction->with_commission = $request->getWithCommission();
        $transaction->created_at = $request->getCreatedAt();

        if ($transaction->status !== $request->getStatus()) {
            if ($request->getStatus() === Transaction::APPROVED_STATUS) {
                if (in_array($transaction->type, [Transaction::WITHDRAW_TYPE, Transaction::DEPOSIT_TYPE])) {
                    $senderWallet = $this->walletRepository->getWalletByUserIdAndCurrType(
                        (int)$transaction->sender->id,
                        $transaction->currency_type
                    );

                    if (!$senderWallet) {
                        throw ValidationException::withMessages([
                            'error' => "Cannot find sender wallet!"
                        ]);
                    }
                    if ($transaction->type === Transaction::DEPOSIT_TYPE) {
                        $senderWallet->amount += $transaction->amount;
                    }

                    if ($transaction->type === Transaction::WITHDRAW_TYPE) {
                        $senderWallet->amount -= $transaction->amount;
                    }
                    $this->walletRepository->save($senderWallet);
                }

                if ($transaction->type === Transaction::TRANSFER_TYPE) {
                    $senderWallet = $this->walletRepository->getWalletByUserIdAndCurrType(
                        (int)$transaction->sender_id,
                        $transaction->currency_type,
                    );
                    $receiverWallet = $this->walletRepository->getWalletByUserIdAndCurrType(
                        (int)$transaction->receiver_id,
                        $transaction->currency_type,
                    );

                    if ($senderWallet->amount < $transaction->with_commission) {
                        throw ValidationException::withMessages([
                            'error' => "Sender doesn't have such amount!"
                        ]);
                    }
                    $senderWallet->amount -= $transaction->with_commission;
                    $receiverWallet->amount += $transaction->amount;

                    $this->walletRepository->save($senderWallet);
                    $this->walletRepository->save($receiverWallet);
                }
                $transaction->status = $request->getStatus();
                $transaction->save();
                return;
            }
            $transaction->status = $request->getStatus();
            $transaction->save();
        }
        $transaction->save();
    }
}
