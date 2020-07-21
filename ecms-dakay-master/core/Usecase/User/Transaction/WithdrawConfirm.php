<?php

namespace Core\Usecase\User\Transaction;

use Core\Repository\User\UserTransactionRepository;
use Core\Domain\Contract\CFContract;
use Core\Domain\Contract\EmailerContract;
use Core\Domain\Entity\Transaction;
use Core\Exception;

class WithdrawConfirm
{
    protected $repository;
    protected $cf;
    protected $emailer;

    public function __construct(UserTransactionRepository $repository, CFContract $cf, EmailerContract $emailer)
    {
        $this->repository = $repository;
        $this->cf = $cf;
        $this->emailer = $emailer;
    }

    public function handle($id)
    {
        $transaction = $this->repository->find_by_id($id);

        if (! $transaction)
            throw new Exception\TransactionNotFound('transaction not found');

        if ($transaction['status'] != Transaction::STATUS_PENDING)
            throw new Exception\TransactionStatus('transaction status not pending');

        $user = $transaction['user'];

        $cf_transaction_code = $this->cf->withdrawal($user['id'], $transaction['amount']);

        if ($cf_transaction_code)
        {
            $this->repository->update_transaction($transaction['id'], [
                'is_otp_verified' => true,
                'cf_transaction_code' => $cf_transaction_code
            ]);
        }

        $receivers = $this->repository->get_withdrawal_moderators();

        $this->send_request_email($receivers, $transaction);
    }

    protected function send_request_email($receivers, $withdrawal_details)
    {
        foreach ($receivers as $receiver)
        {
            $this->emailer->to($receiver['email'], $receiver['name']);
            $this->emailer->data([
                'moderator_name' => $receiver['name'],
                'transaction_code' => $withdrawal_details['transaction_code'],
                'account_name' => $withdrawal_details['bank_account_name'],
                'bank_name' => $withdrawal_details['bank_name'],
                'bank_account_number' => $withdrawal_details['bank_account_number'],
                'bank_transaction_number' => $withdrawal_details['bank_transaction_number'],
                'amount' => $withdrawal_details['amount'],
                'currency' => $withdrawal_details['currency'],
            ]);

            $this->emailer->send();
        }
    }
}
