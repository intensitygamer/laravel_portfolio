<?php

namespace Core\Usecase\Location;

use Core\Repository\Location\LocationDeleteRepository;

class LocationDelete
{
    protected $repository;

    public function __construct(LocationDeleteRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle($id)
    {
        $this->repository->delete_location($id);
    }
}