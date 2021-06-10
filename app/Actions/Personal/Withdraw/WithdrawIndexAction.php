<?php


namespace App\Actions\Personal\Withdraw;


use App\Repositories\Transaction\TransactionRepositoryInterface;

class WithdrawIndexAction
{
    private TransactionRepositoryInterface $transactionRepository;

    public function __construct(
        TransactionRepositoryInterface $transactionRepository
    ) {
        $this->transactionRepository = $transactionRepository;
    }

    public function execute(): WithdrawIndexResponse
    {
        $transactions = $this->transactionRepository->getWithdrawTransactions();

        return new WithdrawIndexResponse($transactions);
    }
}
