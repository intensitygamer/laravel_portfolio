<?php

namespace Core\Usecase\Location;

use Core\Repository\Location\LocationUpdateRepository;
use Illuminate\Http\Request;

class LocationUpdate
{
    protected $repository;

    public function __construct(LocationUpdateRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle($id, Request $request)
    {
        return $this->repository->update_location($id, $request);
    }
}
