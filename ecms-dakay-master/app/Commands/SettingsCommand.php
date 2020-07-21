<?php

namespace App\Commands;

use Illuminate\Http\Request;

use App\Repositories\SettingsRepository;

use Core\Usecase\Settings;

class SettingsCommand
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function execute()
    {
        $usecase = new Settings(new SettingsRepository);

        $settings = [];

        $settings['player_min_deposit'] = $this->request->get('player_min_deposit', 1);
        $settings['player_max_deposit'] = $this->request->get('player_max_deposit', 1000);
        $settings['player_min_withdraw'] = $this->request->get('player_min_withdraw', 1);
        $settings['player_max_withdraw'] = $this->request->get('player_max_withdraw', 1000);
        $settings['minimum_play_balance'] = $this->request->get('minimum_play_balance', 1);

        $emails = $this->request->get('transaction_emails', null);

        if ($emails)
        {
            foreach (explode(',', $emails) as $email)
            {
                if (filter_var(trim($email), FILTER_VALIDATE_EMAIL))
                    $settings['transaction_emails'][] = trim($email);
            }

            if (isset($settings['transaction_emails']) && (bool) count($settings['transaction_emails']))
                $settings['transaction_emails'] = implode(',', $settings['transaction_emails']);
            else
                $settings['transaction_emails'] = env('DEFAULT_TRANSACTION_EMAIL_RECEIVER');
        }

        $usecase->handle($settings);
    }
}
