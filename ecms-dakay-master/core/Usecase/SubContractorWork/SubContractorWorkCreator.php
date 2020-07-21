<?php

namespace Core\Usecase\SubContractorWork;

use Core\Repository\SubContractorWork\SubContractorWorkRepository;
use Core\Exception;

class SubContractorWorkCreator
{
    public function __construct(SubContractorWorkRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle($subcontractor_work)
    {

        $this->validate_payment_amount($subcontractor_work->contract_amount, $subcontractor_work->total_current_paid_amount );

        $new_subcontractor_work = $this->repository->store_subcontractor_work([
            'transaction_no' => $subcontractor_work->transaction_no,
            'transaction_date' => $subcontractor_work->transaction_date,
            'created_user_id' => \Auth::user()->id,
            'updated_user_id' => \Auth::user()->id,

            /**
             * For other details
             */
            'subcontractor' => $subcontractor_work->subcontractor,
            'equipment' => $subcontractor_work->equipment,

            'project' => $subcontractor_work->project,
            'scope_of_work' => $subcontractor_work->scope_of_work,
            'project_start_date' => $subcontractor_work->project_start_date,

            'contract_amount' => $subcontractor_work->contract_amount,
            
            'total_current_paid_amount' => $subcontractor_work->total_current_paid_amount,

            'total_amount_due_left' => $subcontractor_work->total_amount_due_left

            // 'total_current_paid_amount' => $subcontractor_work->total_current_paid_amount
            // 'total_current_paid_amount' => $subcontractor_work->total_current_paid_amount,
            // 'total_amount_due_left' => 0

        ]);

        return $new_subcontractor_work;
    }

    public function validate_payment_amount($contract_amount, $amount_paid)
    {

            if($amount_paid > $contract_amount)

                throw new Exception\ReportsException(['Amount to pay should less than contract amount, Contract amount is ' . $contract_amount]);


    }
}