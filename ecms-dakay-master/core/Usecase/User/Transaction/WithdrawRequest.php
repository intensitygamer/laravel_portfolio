<?php

namespace Core\Usecase\User\Transaction;

use App\Repositories\SettingsRepository;
use Core\Repository\User\UserTransactionRepository;
use Core\Domain\Contract\CFContract;
use Core\Domain\Contract\ValidatorContract;
use Core\Exception;

class WithdrawRequest
{
    protected $repository;
    protected $cf;
    protected $settings_repository;

    public function __construct(UserTransactionRepository $repository, CFContract $cf, SettingsRepository $settings_repository)
    {
        $this->repository = $repository;
        $this->cf = $cf;
        $this->settings_repository = $settings_repository;
    }

    public function handle(array $withdraw_details)
    {
        $user = $this->repository->get_user($withdraw_details['user_id']);

        $withdraw_details['bank_account_name'] = $user['bank_account_name'];
        $withdraw_details['bank_name'] = $user['bank']['name'];
        $withdraw_details['bank_account_number'] = $user['bank_account_number'];

        $this->validate_current_balance($user['id'], $withdraw_details['amount']);

        return $this->repository->request_withdrawal($withdraw_details);
    }

    protected function validate_current_balance($user_id, $amount)
    {
        $balance = $this->cf->get_user_balance($user_id);

        if ($amount > $balance)
            throw new Exception\TransactionWithdrawalInsufficientAmount('Insufficient current balance.');
    }
}
