<?php

namespace App\Actions\Personal\History;

use App\Repositories\Transaction\TransactionRepositoryInterface;

final class HistoryIndexAction
{
    private TransactionRepositoryInterface $transactionRepository;

    public function __construct(
        TransactionRepositoryInterface $transactionRepository
    ) {
        $this->transactionRepository = $transactionRepository;
    }

    public function execute(): HistoryIndexResponse
    {
        $transactions = $this->transactionRepository->getAllMyTransaction();

        return new HistoryIndexResponse($transactions);
    }
}
