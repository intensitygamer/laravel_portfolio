<?php

namespace App\Commands\User\Transaction;

use Illuminate\Http\Request;

use Transaction;

class WithdrawalCancelCommand
{
    protected $request;
    protected $transaction_id;

    public function __construct($transaction_id)
    {
        $this->transaction_id = $transaction_id;
    }

    public function execute()
    {
        $transaction = new Transaction;

        return $transaction->withdrawal_cancel($this->transaction_id);
    }
}