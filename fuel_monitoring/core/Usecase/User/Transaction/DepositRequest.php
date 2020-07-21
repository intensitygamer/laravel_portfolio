<?php

namespace Core\Usecase\User\Transaction;

use App\Repositories\SettingsRepository;
use Core\Repository\User\UserTransactionRepository;
use Core\Domain\Contract\EmailerContract;
use Core\Exception;

class DepositRequest
{
    protected $repository;
    protected $emailer;
    protected $settings_repository;

    public function __construct(UserTransactionRepository $repository, EmailerContract $emailer, SettingsRepository $settings_repository)
    {
        $this->repository = $repository;
        $this->emailer = $emailer;
        $this->settings_repository = $settings_repository;
    }

    public function handle(array $deposit_details)
    {
        $user = $this->repository->get_user($deposit_details['user_id']);
        $target_bank = $this->repository->get_target_bank($deposit_details['bank_id']);

        $deposit_details['bank_account_name'] = $user['bank_account_name'];
        $deposit_details['bank_name'] = $user['bank']['name'];
        $deposit_details['bank_account_number'] = $user['bank_account_number'];

        $deposit_details['target_bank_account_name'] = $target_bank['owner'];
        $deposit_details['target_bank_name'] = $target_bank['bank_name'];
        $deposit_details['target_bank_account_number'] = $target_bank['account_number'];

        $deposit_request_id = $this->repository->request_deposit($deposit_details);

        $deposit_details = $this->repository->find_by_id($deposit_request_id);

        $receivers = $this->repository->get_deposit_moderators();

        $this->send_request_email($receivers, $deposit_details);

        return $deposit_request_id;
    }

    protected function send_request_email($receivers, $deposit_details)
    {
        foreach ($receivers as $receiver)
        {
            $deposit_details['moderator_name'] = $receiver['name'];

            $this->emailer->to($receiver['email'], $receiver['name']);
            $this->emailer->data($deposit_details);

            $this->emailer->send();
        }
    }
}
