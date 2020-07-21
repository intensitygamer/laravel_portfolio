<?php

namespace Core\Usecase\Location;

use Core\Repository\Location\LocationSearchRepository;

class LocationSearch
{
    protected $repository;

    public function __construct(LocationSearchRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle($filters, $page = 1, $per_page = 15)
    {
        $locations = $this->repository->get_locations($filters, $page, $per_page);

        return $locations;
    }
}