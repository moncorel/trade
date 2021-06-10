<?php

namespace App\Actions\Admin\Transaction;

use App\Models\Transaction;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\Wallet\WalletRepositoryInterface;
use Illuminate\Validation\ValidationException;

final class ChangeStatusAction
{
    private WalletRepositoryInterface $walletRepository;
    private UserRepositoryInterface $userRepository;

    public function __construct(
        WalletRepositoryInterface $walletRepository,
        UserRepositoryInterface $userRepository
    ) {
        $this->walletRepository = $walletRepository;
        $this->userRepository = $userRepository;
    }

    public function execute(ChangeStatusRequest $request)
    {
        $transaction = Transaction::findOrFail($request->getTransactionId());

        if ($transaction->status !== $request->getStatus()) {
            if ($request->getStatus() === Transaction::APPROVED_STATUS) {
                if (in_array($transaction->type, [Transaction::WITHDRAW_TYPE, Transaction::DEPOSIT_TYPE])) {
                    $senderWallet = $this->walletRepository->getWalletByUserIdAndCurrType(
                        (int)$transaction->sender->id,
                        $transaction->currency_type
                    );

                    if (!$senderWallet) {
                        throw ValidationException::withMessages([
                            'error' => "Something went wrong!"
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
                return new ChangeStatusResponse("success");
            }
            $transaction->status = $request->getStatus();
            $transaction->save();
            return new ChangeStatusResponse("declined");
        }
    }
}
