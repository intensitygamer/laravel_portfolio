<?php

namespace App\Tool;

use App\Tool\SMS\ISMS;

use Core\Domain\Contract\SMSContract;

class TransactionSMS implements SMSContract
{
    const DEPOSIT_APPROVE = 1;

    const DEPOSIT_REJECT = 2;

    const WITHDRAW_APPROVE = 3;

    const WITHDRAW_REJECT = 4;

    protected $transaction_code;
    protected $action;

    public function __construct($transaction_code, $action)
    {
        $this->transaction_code = $transaction_code;
        $this->action = $action;
    }

    public function send($number)
    {
        // @todo refactor.
        $number = str_replace('.', '', $number);

        $message = new ISMS\Message($number, $this->get_action_message());

        $sender = new ISMS\Sender($message);

        $sender->send();
    }

    protected function get_action_message()
    {
        switch ($this->action)
        {
            case self::DEPOSIT_APPROVE:
                $message = sprintf(trans('messages.Your deposit request with transaction code "%s" has been approved.'), $this->transaction_code);
                break;

            case self::DEPOSIT_REJECT:
                $message = sprintf(trans('messages.Your deposit request with transaction code "%s" has been rejected.'), $this->transaction_code);
                break;

            case self::WITHDRAW_APPROVE:
                $message = sprintf(trans('messages.Your withdrawal request with transaction code "%s" has been approved.'), $this->transaction_code);
                break;

            case self::WITHDRAW_REJECT:
                $message = sprintf(trans('messages.Your withdrawal request with transaction code "%s" has been rejected.'), $this->transaction_code);
                break;
        }

        return $message;
    }
}
