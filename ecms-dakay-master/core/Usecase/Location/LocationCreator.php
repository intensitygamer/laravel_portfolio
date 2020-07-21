<?php

namespace Core\Usecase\Location;

use Core\Repository\Location\LocationRegistryRepository;

class LocationCreator
{
    public function __construct(LocationRegistryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle($location)
    {

        $new_location = $this->repository->create_location([
            'name' => $location->name,
            'location_date' => $location->location_date,
            'address' => $location->address,
            'phone_no' => $location->phone_no,
            'contact_person' => $location->contact_person,
            'created_user_id' => \Auth::user()->id,
        ]);

        return $new_location;
    }
}