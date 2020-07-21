<?php

namespace App\Commands\User\Transaction;

use Illuminate\Http\Request;

use Transaction;

class DepositUpdateCommand
{
    protected $id;
    protected $request;
    protected $deposit_details;

    public function __construct($id, Request $request)
    {
        $this->id = $id;

        $this->deposit_details['bank_transaction_number'] = $request->get('bank_transaction_number');
        $this->deposit_details['bank_account_name'] = $request->get('bank_account_name');
        $this->deposit_details['bank_account_number'] = $request->get('bank_account_number');
        $this->deposit_details['bank_name'] = $request->get('bank_name');
        $this->deposit_details['amount'] = $request->get('amount');
        $this->deposit_details['currency'] = $request->get('currency');

        if ($request->get('status', null))
            $this->deposit_details['status'] = $request->get('status');

        if ($request->get('transaction_date', null))
            $this->deposit_details['transaction_date'] = $request->get('transaction_date');

        if ($request->get('remarks', null))
            $this->deposit_details['remarks'] = $request->get('remarks');

        $this->request = $request;
    }

    public function execute()
    {
        $transaction = new Transaction;

        $transaction->deposit_update($this->id, $this->deposit_details);
    }
}