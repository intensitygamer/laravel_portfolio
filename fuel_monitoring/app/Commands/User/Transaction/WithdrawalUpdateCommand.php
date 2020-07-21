<?php

namespace App\Commands\User\Transaction;

use Illuminate\Http\Request;

use Transaction;

class WithdrawalUpdateCommand
{
    protected $id;
    protected $request;
    protected $withdrawal_details;

    public function __construct($id, Request $request)
    {
        $this->id = $id;

        $this->withdrawal_details['bank_transaction_number'] = $request->get('bank_transaction_number');
        $this->withdrawal_details['bank_account_name'] = $request->get('bank_account_name');
        $this->withdrawal_details['bank_account_number'] = $request->get('bank_account_number');
        $this->withdrawal_details['bank_name'] = $request->get('bank_name');
        $this->withdrawal_details['amount'] = $request->get('amount');
        $this->withdrawal_details['currency'] = $request->get('currency');

        if ($request->get('status', null))
            $this->withdrawal_details['status'] = $request->get('status');

        if ($request->get('transaction_date', null))
            $this->withdrawal_details['transaction_date'] = $request->get('transaction_date');

        if ($request->get('remarks', null))
            $this->withdrawal_details['remarks'] = $request->get('remarks');

        if ($request->get('is_otp_verified', null))
            $this->withdrawal_details['is_otp_verified'] = $request->get('is_otp_verified');

        $this->request = $request;
    }

    public function execute()
    {
        $transaction = new Transaction;

        $transaction->withdrawal_update($this->id, $this->withdrawal_details);
    }
}