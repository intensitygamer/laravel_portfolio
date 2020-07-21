<?php

namespace Core\Usecase\User\Transaction;

use Core\Repository\User\UserTransactionRepository;
use Core\Domain\Contract\SMSContract;
use Core\Domain\Entity\Transaction;
use Core\Exception;

class DepositReject
{
    protected $repository;
    protected $sms;

    public function __construct(UserTransactionRepository $repository, SMSContract $sms)
    {
        $this->repository = $repository;
        $this->sms = $sms;
    }

    public function handle($id, $remarks = null)
    {
        $transaction = $this->repository->find_by_id($id);

        if (! $transaction)
            throw new Exception\TransactionNotFound('transaction not found');

        if ($transaction['status'] != Transaction::STATUS_PENDING)
            throw new Exception\TransactionStatus('transaction status not pending');

        $user = $this->repository->get_user($transaction['user_id']);

        $this->repository->reject_transaction($id, $remarks);

        $this->sms->send($user['contact_number']);
    }
}
