<?php

namespace Core\Usecase\Project;

use Core\Repository\Project\ProjectRepository;
use Core\Exception;

class ProjectCreator
{
    public function __construct(ProjectRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle($project)
    {
        // if($fuel->out)
        //     $this->check_fuel_stock($fuel->out);

        $new_project = $this->repository->save_project([
            'name' => $project->name,
            'location' => $project->location,
            'created_user_id' => \Auth::user()->id,
            // 'updated_user_id' => \Auth::user()->id,

            /**
             * For fuel stock
             */
            // 'in' => $fuel->in,
            // 'reference_no' => $fuel->reference_no,
            // 'vendor' => $fuel->vendor,
            // 'no_of_hours' => $fuel->no_of_hours,
            // 'millage' => $fuel->millage,
            // 'location' => $fuel->location,

            // /**
            //  * For fuel use
            //  */
            // 'out' => $fuel->out,
            // 'equipment' => $fuel->equipment,
            // 'location' => $fuel->location,
            // 'operator' => $fuel->operator,
            // 'project' => $fuel->project,
            // 'remarks' => $fuel->remarks,
            // 'transaction_time' => $fuel->transaction_time,

        ]);

        return $new_project;
    }

    public function check_fuel_stock($out)
    {
        $available = $this->repository->available_fuel(0, false);

        if($available < $out)
            throw new Exception\ReportsException(['Fuel stock not enough, Current Stock is '.$available]);
    }
}