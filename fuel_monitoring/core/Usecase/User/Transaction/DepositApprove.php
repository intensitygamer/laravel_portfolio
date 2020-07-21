<?php

namespace Core\Usecase\User\Transaction;

use Core\Repository\User\UserTransactionRepository;
use Core\Domain\Entity\User as UserEntity;
use Core\Domain\Contract\CFContract;
use Core\Domain\Contract\EmailerContract;
use Core\Domain\Contract\SMSContract;
use Core\Domain\Entity\Transaction;
use Core\Exception;

class DepositApprove
{
    protected $repository;
    protected $cf;
    protected $validator;
    protected $emailer;

    public function __construct(UserTransactionRepository $repository, CFContract $cf, EmailerContract $emailer, SMSContract $sms)
    {
        $this->repository = $repository;
        $this->cf = $cf;
        $this->emailer = $emailer;
        $this->sms = $sms;
    }

    public function handle($id)
    {
        $transaction = $this->repository->find_by_id($id);

        if (! $transaction)
            throw new Exception\TransactionNotFound('transaction not found');

        if ($transaction['status'] != Transaction::STATUS_PENDING)
            throw new Exception\TransactionStatus('transaction status not pending');

        $user = $this->repository->get_user($transaction['user_id']);

        if ($this->cf->approve_deposit($user['id'], $transaction['amount']))
        {
            $this->repository->approve_transaction($transaction['id']);
            $this->sms->send($user['contact_number']);

            // mark user active on first deposit.
            if ($user['status'] == UserEntity::STATUS_INACTIVE)
                $this->mark_player_active($user['id']);

            // @todo send email
        }
    }

    private function mark_player_active($user_id)
    {
        $this->repository->mark_user_active($user_id);
    }
}
