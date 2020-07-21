<?php

namespace Core\Usecase\User\Transaction;

use Core\Repository\User\UserTransactionRepository;
use Core\Domain\Contract\ValidatorContract;
use Core\Domain\Entity\Transaction;
use Core\Exception;

class WithdrawUpdate
{
    protected $repository;
    protected $validator;

    public function __construct(UserTransactionRepository $repository, ValidatorContract $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function handle($id, array $deposit_details)
    {
        $this->validate(array_merge($deposit_details, ['id' => $id]));

        $transaction = $this->repository->find_by_id($id);

        if ($transaction['status'] != Transaction::STATUS_PENDING)
            throw new Exception\TransactionStatus('transaction status not pending');

        $this->repository->update_transaction($id, $deposit_details);
    }

    protected function validate($details)
    {
        $this->validator->setup($details);

        $this->validator->add_rule('id', ['required', 'exists:user_transactions,id']);

        if (isset($details['bank_transaction_number']))
            $this->validator->add_rule('bank_transaction_number', ['required']);

        if (isset($details['bank_account_number']))
            $this->validator->add_rule('bank_account_number', ['required']);

        if (isset($details['bank_account_name']))
            $this->validator->add_rule('bank_account_name', ['required']);

        if (isset($details['bank_name']))
            $this->validator->add_rule('bank_name', ['required']);

        if (isset($details['amount']))
            $this->validator->add_rule('amount', ['required']);

        if (isset($details['currency']))
            $this->validator->add_rule('currency', ['required']);

        if (isset($details['transaction_date']))
            $this->validator->add_rule('transaction_date', ['required', 'date']);

        if (! $this->validator->is_valid())
            throw new Exception\ValidationException($this->validator);
    }
}