<?php

namespace App\Actions\Admin\User;

use App\Models\User;
use App\Repositories\Transaction\TransactionRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;

final class GetUserByIdAction
{
    private TransactionRepositoryInterface $transactionRepository;

    public function __construct(
        TransactionRepositoryInterface $transactionRepository
    ) {
        $this->transactionRepository = $transactionRepository;
    }

    public function execute(GetUserByIdRequest $request)
    {
        $user = User::with([
            'btcWallet',
            'ethWallet',
            'bchWallet',
        ])->findOrFail($request->getId());

        $transactions = $this->transactionRepository->getAllTransactionsForUser($user);

        return new GetUserByIdResponse($user, $transactions);
    }
}
