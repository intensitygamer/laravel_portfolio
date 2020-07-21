<?php

namespace Core\Usecase\User\Transaction;

use Core\Repository\User\UserTransactionRepository;
use Core\Domain\Entity\Transaction;
use Core\Exception;

class DepositUpdate
{
    protected $repository;

    public function __construct(UserTransactionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle($id, array $deposit_details)
    {
        $transaction = $this->repository->find_by_id($id);

        if (! $transaction)
            throw new Exception\TransactionNotFound('transaction not found');

        if ($transaction['status'] != Transaction::STATUS_PENDING)
            throw new Exception\TransactionStatus('transaction status not pending');

        $this->repository->update_transaction($id, $deposit_details);
    }
}
