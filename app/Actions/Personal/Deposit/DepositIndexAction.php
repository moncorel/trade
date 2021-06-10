<?php

namespace App\Actions\Personal\Deposit;

use App\Repositories\Transaction\TransactionRepositoryInterface;

final class DepositIndexAction
{
    private TransactionRepositoryInterface $transactionRepository;

    public function __construct(
        TransactionRepositoryInterface $transactionRepository
    ) {
        $this->transactionRepository = $transactionRepository;
    }

    public function execute(): DepositIndexResponse
    {
        $transactions = $this->transactionRepository->getDepositTransactions();

        return new DepositIndexResponse($transactions);
    }
}
