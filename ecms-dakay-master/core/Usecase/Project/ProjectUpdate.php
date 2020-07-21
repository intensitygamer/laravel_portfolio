<?php

namespace Core\Usecase\Project;

use Core\Repository\Project\ProjectRepository;
use Illuminate\Http\Request;
use Core\Exception;

class ProjectUpdate
{
    protected $repository;

    public function __construct(ProjectRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle($id, Request $request)
    {
        $project = $this->repository->get_project_by_id($id);
        // dd($request);
        return $this->repository->update_project($id, $request);
    }

    // public function check_fuel_stock($out, $current_out)
    // {
    //     $available = $this->repository->available_fuel($out, true);

    //     if($available < $current_out)
    //         throw new Exception\ReportsException(['Fuel stock not enough, Current Stock is '.$available]);
    // }

    // public function check_fuel_use($in, $current_in)
    // {
    //     $stock_total = $this->repository->updated_stocked_fuel($in, $current_in);
    //     $fuel_total = ($this->repository->used_fuel())->value;
    //     $deducted = bcsub($fuel_total, $stock_total);

    //     if($stock_total < $fuel_total){
    //         $range = $deducted + $current_in;
    //         throw new Exception\ReportsException(['Fuel stock should be greater than '.$range.'. Total use fuel is '.$fuel_total]);
    //     }
    // }
}