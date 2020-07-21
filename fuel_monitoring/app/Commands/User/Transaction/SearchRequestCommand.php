<?php

namespace App\Commands\User\Transaction;

use Illuminate\Http\Request;

use App\Repositories\Transaction\TransactionsRepository;
use App\Transformers\UserTransactionTransformer;

use Core\Usecase\User\Transaction\Transactions as UserTransactions;

class SearchRequestCommand
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->transformer = new UserTransactionTransformer;
    }

    public function execute()
    {
        $usecase = new UserTransactions(
            new TransactionsRepository
        );

        $page = $this->request->get('page', 1);

        $filters['user_id'] = $this->request->get('user_id');
        $filters['transaction_type'] = $this->request->get('transaction_type');
        $filters['is_otp_verified'] = $this->request->get('is_otp_verified');

        if($this->request->get('status') != '')
            $filters['status'] = $this->request->get('status');

        if($this->request->get('qu') != '')
            $filters['query_user'] = $this->request->get('qu');

        if($this->request->get('qt') != '')
            $filters['query_transaction'] = $this->request->get('qt');

        if($this->request->get('start_date') != '' && $this->request->get('end_date') != '')
            $filters['date'] = ['start' => $this->request->get('start_date')." 00:00:00", 'end' => $this->request->get('end_date')." 23:59:59"];

        $transactions = $usecase->handle($filters, $page);

        if ($transactions['total'])
            $transactions['data'] = $this->transformer->transform_collection($transactions['data']);

        $transactions = $this->paginate($transactions['data'], $transactions['total']);

        return $transactions;
    }

    protected function paginate($data, $total)
    {
        $p = new \Illuminate\Pagination\LengthAwarePaginator($data, $total, 15);
        $p->setPath('/transactions');

        return $p;
    }
}