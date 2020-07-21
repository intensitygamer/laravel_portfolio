<?php

namespace Core\Usecase\User\Transaction;

use Core\Repository\User\UserTransactionRepository;
use Core\Exception;

class Details
{
    protected $repository;
    protected $validator;

    public function __construct(UserTransactionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle($transaction_code)
    {
        $transaction = $this->repository->details($transaction_code);

        if (! $transaction)
            throw new Exception\TransactionNotFound('transaction not found');

        return $transaction;
    }
}
