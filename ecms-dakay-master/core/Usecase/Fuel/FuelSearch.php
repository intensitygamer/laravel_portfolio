<?php

namespace Core\Usecase\Fuel;

use Core\Repository\Fuel\FuelRepository;

class FuelSearch
{
    protected $repository;

    public function __construct(FuelRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle($filters, $page = 1, $per_page = 15)
    {
        $fuels = $this->repository->get_fuels($filters, $page, $per_page);

        return $fuels;
    }

    public function handlePE($filters)
    {
        $fuels = $this->repository->get_pe_fuels($filters);

        return $fuels;
    }
}