<?php

namespace Core\Usecase\User\Transaction;

use Core\Repository\User\UserTransactionRepository;
use Core\Domain\Contract\CFContract;
use Core\Domain\Contract\EmailerContract;
use Core\Domain\Contract\SMSContract;
use Core\Domain\Entity\Transaction;
use Core\Exception;

class WithdrawApprove
{
    protected $repository;
    protected $cf;
    protected $emailer;

    public function __construct(UserTransactionRepository $repository, CFContract $cf, EmailerContract $emailer, SMSContract $sms)
    {
        $this->repository = $repository;
        $this->cf = $cf;
        $this->emailer = $emailer;
        $this->sms = $sms;
    }

    public function handle($id, array $bank)
    {
        $transaction = $this->repository->find_by_id($id);

        if (! $transaction)
            throw new Exception\TransactionNotFound('transaction not found');

        if ($transaction['status'] != Transaction::STATUS_PENDING)
            throw new Exception\TransactionStatus('transaction status not pending');

        $user = $transaction['user'];

        $this->repository->approve_transaction($transaction['id']);

        $this->repository->update_transaction($transaction['id'], $bank);

        $this->sms->send($user['contact_number']);

        // @todo send email
    }
}
