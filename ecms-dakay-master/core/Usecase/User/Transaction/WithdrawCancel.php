<?php

namespace Core\Usecase\User\Transaction;

use Core\Repository\User\UserTransactionRepository;
use Core\Domain\Contract\CFContract;
use Core\Domain\Contract\EmailerContract;
use Core\Domain\Contract\SMSContract;
use Core\Domain\Entity\Transaction;
use Core\Exception;

class WithdrawCancel
{
    protected $repository;
    protected $cf;

    public function __construct(UserTransactionRepository $repository, CFContract $cf)
    {
        $this->repository = $repository;
        $this->cf = $cf;
    }

    public function handle($id)
    {
        $transaction = $this->repository->find_by_id($id);

        if (! $transaction)
            throw new Exception\TransactionNotFound('transaction not found');

        if ($transaction['status'] != Transaction::STATUS_PENDING)
            throw new Exception\TransactionStatus('transaction status not pending');

        $user = $transaction['user'];

        // @todo refactor
        $cf_okay = true;

        if ($transaction['cf_transaction_code'])
            $cf_okay = $this->cf->cancel_withdrawal($transaction['transaction_code']);

        if ($cf_okay)
            $this->repository->cancel_transaction($transaction['id']);
    }
}
