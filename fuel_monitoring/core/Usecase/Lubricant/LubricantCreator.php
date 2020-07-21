<?php

namespace Core\Usecase\Lubricant;

use Core\Repository\Lubricant\LubricantRepository;
use App\Models\TypeOfOil;
use Core\Exception;

class LubricantCreator
{
    public function __construct(LubricantRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle($lubricant)
    {
        if($lubricant->out)
            $this->check_lubricant_stock($lubricant->out, $lubricant->type_of_oil_id);

        $new_lubricant = $this->repository->store_lubricant([
            'transaction_no' => $lubricant->transaction_no,
            'transaction_date' => $lubricant->transaction_date,
            'type_of_oil_id' => $lubricant->type_of_oil_id,
            'created_user_id' => \Auth::user()->id,
            'updated_user_id' => \Auth::user()->id,

            /**
             * For lubricant stock
             */
            'in' => $lubricant->in,
            'reference_no' => $lubricant->reference_no,
            'vendor' => $lubricant->vendor,

            /**
             * For lubricant use
             */
            'out' => $lubricant->out,
            'equipment' => $lubricant->equipment,
            'operator' => $lubricant->operator,
            'location' => $lubricant->location,
            'project' => $lubricant->project,
            'remarks' => $lubricant->remarks,

        ]);

        return $new_lubricant;
    }

    public function check_lubricant_stock($out, $type_id)
    {
        $oil = (new TypeOfOil)->where('id',$type_id)->first();

        $available = $this->repository->available_lubricant(0, false, $type_id);

        if($available < $out)
            throw new Exception\ReportsException(['Lubricant '.$oil->name.' stock not enough, Current Stock is '.$available]);
    }
}