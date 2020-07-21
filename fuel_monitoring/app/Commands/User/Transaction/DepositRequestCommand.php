<?php

namespace App\Commands\User\Transaction;

use Illuminate\Http\Request;

use App\Generators;
use App\Tool\Authenticator;

use Transaction;

class DepositRequestCommand
{
    protected $request;
    protected $deposit_details;

    public function __construct(Request $request)
    {
        $authenticator = new Authenticator;

        $transaction_code = new Generators\TransactionCode;
        $transaction_code->prefix('TBD');

        $this->deposit_details['bank_transaction_number'] = $request->get('bank_transaction_number');
        $this->deposit_details['bank_id'] = $request->get('bank_id');

        $this->deposit_details['user_id'] = $authenticator->get_authenticated_id();
        $this->deposit_details['transaction_code'] = $transaction_code->generate();
        $this->deposit_details['transaction_type'] = 'deposit';
        $this->deposit_details['amount'] = $request->get('amount');
        $this->deposit_details['currency'] = $request->get('currency');
        $this->deposit_details['promo_code'] = $request->get('promo_code');
        $this->deposit_details['transaction_date'] = $request->get('transaction_date');
        $this->deposit_details['remarks'] = $request->get('remarks');

        $this->request = $request;
    }

    public function execute()
    {
        $transaction = new Transaction;

        return $transaction->deposit_request($this->deposit_details);
    }
}
