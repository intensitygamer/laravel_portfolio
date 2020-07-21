<?php

namespace App\Commands\User\Transaction;

use Illuminate\Http\Request;

use App\Generators;
use App\Tool\Authenticator;

use App\Repositories;
use App\Transformers;
use Core\Usecase\User\UserDetail;

use Transaction;

class WithdrawalRequestCommand
{
    protected $request;
    protected $withdrawal_details;

    public function __construct(Request $request)
    {
        $authenticator = new Authenticator;

        $transaction_code = new Generators\TransactionCode;
        $transaction_code->prefix('TBW');

        $user = $this->get_user($authenticator->get_username());

        $this->withdrawal_details['bank_account_name'] = $user['bank']['account_name'];
        $this->withdrawal_details['bank_name'] = $user['bank']['name'];
        $this->withdrawal_details['bank_account_number'] = $user['bank']['account_number'];

        $this->withdrawal_details['user_id'] = $authenticator->get_authenticated_id();
        $this->withdrawal_details['transaction_code'] = $transaction_code->generate();
        $this->withdrawal_details['transaction_type'] = 'withdrawal';
        $this->withdrawal_details['amount'] = $request->get('amount');
        $this->withdrawal_details['currency'] = $request->get('currency');
        $this->withdrawal_details['transaction_date'] = $request->get('transaction_date');
        $this->withdrawal_details['remarks'] = $request->get('remarks');

        $this->request = $request;
    }

    public function execute()
    {
        $transaction = new Transaction;

        return $transaction->withdrawal_request($this->withdrawal_details);
    }

    protected function get_user($username)
    {
        $usecase = new UserDetail(new Repositories\UserRepository);
        $transformer = new Transformers\UserTransformer;

        return $transformer->transform_item($usecase->handle($username));
    }
}
