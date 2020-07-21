<?php

namespace Core\Usecase\Fuel;

use Core\Repository\Fuel\FuelRepository;
use Core\Validator;
use Core\Exception;

class FuelDetail
{
    protected $repository;

    public function __construct(FuelRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle($fuel_id)
    {
        $validator = new Validator;

        $validator->setup([ 'id' => $fuel_id]);

        $validator->add_rule('id', ['required']);

        if (! $validator->is_valid())
            throw new Exception\Validation($validator);

        $fuel = $this->repository->get_fuel_by_id($fuel_id);

        if (! $fuel)
            throw new Exception\ReportsException('Fuel do not exists');

        return $fuel;
    }
}
