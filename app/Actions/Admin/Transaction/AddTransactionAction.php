<?php

namespace App\Actions\Admin\Transaction;

use App\Models\Setting;
use App\Models\Transaction;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Validation\ValidationException;

final class AddTransactionAction
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(AddTransactionRequest $request)
    {
        $sender = $this->userRepository->getUserByNickname($request->getSenderNickname());
        if (!$sender) {
            throw ValidationException::withMessages([
                'sender_nickname' => "User with such nickname not found!"
            ]);
        }

        $transaction = new Transaction();
        $transaction->status = Transaction::PROCESSING_STATUS;
        $transaction->type = $request->getType();
        $transaction->currency_type = $request->getCurrencyType();
        $transaction->amount = $request->getAmount();
        $transaction->sender_id = $sender->id;

        if ($request->getType() === Transaction::TRANSFER_TYPE) {
            if ($request->getSenderNickname() === $request->getReceiverNickname()) {
                throw ValidationException::withMessages([
                    "sender_nickname" => "To transfer transaction you need two users!",
                    "receiver_nickname" => "To transfer transaction you need two users!"
                ]);
            }
            $receiver = $this->userRepository->getUserByNickname($request->getReceiverNickname());
            if (!$receiver) {
                throw ValidationException::withMessages([
                    'receiver_nickname' => "User with such nickname not found!"
                ]);
            }
            $walletName = $request->getCurrencyType() . 'Wallet';
            $senderWallet = $sender->$walletName;

            if ($senderWallet->amount < $request->getAmount()) {
                throw ValidationException::withMessages([
                    'amount' => "You can't transfer more than user has!"
                ]);
            }
            $commission = Setting::getSetting(Setting::TRANSFER_COMMISSION) / 100 + 1;
            $amountWithCommission = $request->getAmount() * $commission;
            $transaction->with_commission = $amountWithCommission;
            $transaction->receiver_id = $receiver->id;
        }

        if ($request->getType() === Transaction::WITHDRAW_TYPE) {
            $walletName = $request->getCurrencyType() . 'Wallet';
            $senderWallet = $sender->$walletName;
            if ($senderWallet->amount < $request->getAmount()) {
                throw ValidationException::withMessages([
                    'amount' => "You can't withdraw more than user has!"
                ]);
            }
            $transaction->external_address = $request->getExternalAddress();
        }

        if ($request->getType() === Transaction::DEPOSIT_TYPE) {
            $transaction->external_address = 'external_address';
        }
        $transaction->save();
    }
}
