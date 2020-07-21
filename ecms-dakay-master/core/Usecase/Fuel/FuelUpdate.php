<?php

namespace Core\Usecase\Fuel;

use Core\Repository\Fuel\FuelRepository;
use Illuminate\Http\Request;
use Core\Exception;

class FuelUpdate
{
    protected $repository;

    public function __construct(FuelRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle($id, Request $request)
    {
        $fuel_monitoring = $this->repository->get_fuel_by_id($id);

        if($fuel_monitoring['out'])
            $this->check_fuel_stock($fuel_monitoring['out'], $request['out']);
        else
            $this->check_fuel_use($fuel_monitoring['in'], $request['in']);

        return $this->repository->update_fuel($id, $request);
    }

    public function check_fuel_stock($out, $current_out)
    {
        $available = $this->repository->available_fuel($out, true);

        if($available < $current_out)
            throw new Exception\ReportsException(['Fuel stock not enough, Current Stock is '.$available]);
    }

    public function check_fuel_use($in, $current_in)
    {
        $stock_total = $this->repository->updated_stocked_fuel($in, $current_in);
        $fuel_total = ($this->repository->used_fuel())->value;
        $deducted = bcsub($fuel_total, $stock_total);

        if($stock_total < $fuel_total){
            $range = $deducted + $current_in;
            throw new Exception\ReportsException(['Fuel stock should be greater than '.$range.'. Total use fuel is '.$fuel_total]);
        }
    }
}