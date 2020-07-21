<?php

namespace Core\Usecase\Location;

use Core\Repository\Location\LocationRepository;
use Core\Validator;
use Core\Exception;

class LocationDetail
{
    protected $repository;

    public function __construct(LocationRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle($location_id)
    {
        $validator = new Validator;

        $validator->setup([ 'id' => $location_id]);

        $validator->add_rule('id', ['required']);

        if (! $validator->is_valid())
            throw new Exception\Validation($validator);

        $location = $this->repository->get_location_by_id($location_id);

        if (! $location)
            throw new Exception\UserNotExists('User do not exists');

        return $location;
    }
}
