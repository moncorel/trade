<?php

namespace App\Actions\Personal\Deposit;

use App\Models\Transaction;
use App\Repositories\Transaction\TransactionRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

final class CreateDepositAction
{
    private TransactionRepositoryInterface $transactionRepository;

    public function __construct(
        TransactionRepositoryInterface $transactionRepository
    ) {
        $this->transactionRepository = $transactionRepository;
    }

    public function execute(CreateDepositRequest $request): CreateDepositResponse
    {
        $transaction = new Transaction();
        $transaction->sender_id = Auth::id();
        $transaction->amount = $request->getAmount();
        $transaction->currency_type = $request->getCurrencyType();
        $transaction->type = Transaction::DEPOSIT_TYPE;
        $transaction->external_address = env('EXTERNAL_ADDRESS_' . Str::upper($request->getCurrencyType()));
        $transaction = $this->transactionRepository->save($transaction);

        return new CreateDepositResponse(
            (float)$transaction->amount,
            $transaction->currency_type,
            (int)$transaction->id,
            $transaction->external_address
        );
    }
}
