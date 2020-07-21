<?php

namespace Core\Usecase\Fuel;

use Core\Repository\Fuel\FuelRepository;
use Core\Exception;

class FuelCreator
{
    public function __construct(FuelRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle($fuel)
    {
        if($fuel->out)
            $this->check_fuel_stock($fuel->out);

        $new_fuel = $this->repository->store_fuel([
            'transaction_no' => $fuel->transaction_no,
            'transaction_date' => $fuel->transaction_date,
            'created_user_id' => \Auth::user()->id,
            'updated_user_id' => \Auth::user()->id,

            /**
             * For fuel stock
             */
            'in' => $fuel->in,
            'reference_no' => $fuel->reference_no,
            'vendor' => $fuel->vendor,
            'no_of_hours' => $fuel->no_of_hours,
            'millage' => $fuel->millage,
            'location' => $fuel->location,

            /**
             * For fuel use
             */
            'out' => $fuel->out,
            'equipment' => $fuel->equipment,
            'location' => $fuel->location,
            'operator' => $fuel->operator,
            'project' => $fuel->project,
            'remarks' => $fuel->remarks,
            'transaction_time' => $fuel->transaction_time,

        ]);

        return $new_fuel;
    }

    public function check_fuel_stock($out)
    {
        $available = $this->repository->available_fuel(0, false);

        if($available < $out)
            throw new Exception\ReportsException(['Fuel stock not enough, Current Stock is '.$available]);
    }
}