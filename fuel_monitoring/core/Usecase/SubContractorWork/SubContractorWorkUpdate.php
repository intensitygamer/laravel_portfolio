<?php

namespace Core\Usecase\SubContractorWork;

use Core\Repository\SubContractorWork\SubContractorWorkRepository;
use Illuminate\Http\Request;
use Core\Exception;

class SubContractorWorkUpdate
{
    protected $repository;

    public function __construct(SubContractorWorkRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle($id, Request $request)
    {
        $subcontractor_work = $this->repository->get_subcontractor_work_by_id($id);

        if(!is_null($request->amount_to_pay)){
            $this->validate_payment_amount($request['amount_to_pay'], $subcontractor_work );
        }

        return $this->repository->update_subcontractor_work($id, $request);
    }

    public function validate_payment_amount($pay, $data)
    {
        if ($pay > $data['contract_amount'])
            throw new Exception\ReportsException(['Amount to pay should less than contract amount, Contract amount is ' . $data['contract_amount']]);

        if ($data['total_amount_due_left'] == 0 || $data['total_amount_due_left'] < 0)
            throw new Exception\ReportsException(['Transaction payment is already completed. Can not add more value.']);

        if ($pay < 0 || $pay > $data['total_amount_due_left'])
            throw new Exception\ReportsException(['Amount to pay should less than of amount due left, Amount due left is ' . $data['total_amount_due_left']]);

    }
}