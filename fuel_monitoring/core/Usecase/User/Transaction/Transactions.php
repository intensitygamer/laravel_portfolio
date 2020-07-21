<?php

namespace Core\Usecase\User\Transaction;

use Core\Repository\User\UserTransactionsRepository;

class Transactions
{
    protected $repository;

    public function __construct(UserTransactionsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle(array $filters, $page = 1)
    {
        return $this->repository->get_transactions($filters, $page);
    }
}