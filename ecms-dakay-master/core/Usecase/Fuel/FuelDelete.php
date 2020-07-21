<?php

namespace Core\Usecase\Fuel;

use Core\Repository\Fuel\FuelRepository;

class FuelDelete
{
    protected $repository;

    public function __construct(FuelDeleteRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle($id)
    {
        $this->repository->delete_fuel($id);
    }
}