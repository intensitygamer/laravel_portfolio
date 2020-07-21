<?php

namespace Core\Usecase\User\Transaction;

use Core\Repository\User\UserTransactionRepository;
use Core\Domain\Contract\CFContract;
use Core\Domain\Contract\EmailerContract;
use Core\Domain\Contract\SMSContract;
use Core\Domain\Entity\Transaction;
use Core\Exception;

class WithdrawReject
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

    public function handle($id, $remarks = null)
    {
        $transaction = $this->repository->find_by_id($id);

        if (! $transaction)
            throw new Exception\TransactionNotFound('transaction not found');

        if ($transaction['status'] != Transaction::STATUS_PENDING)
            throw new Exception\TransactionStatus('transaction status not pending');

        $user = $transaction['user'];

        if ($this->cf->cancel_withdrawal($transaction['transaction_code']))
        {
            $this->repository->reject_transaction($transaction['id'], $remarks);
            $this->sms->send($user['contact_number']);

            // @todo send email
        }
    }
}
