<?php

namespace App\Commands\Location;

use App\Repositories\Location\LocationRegistryRepository;
use Core\Usecase\Location\LocationCreator;
use Illuminate\Http\Request;

class LocationCreatorCommand
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function execute()
    {
        $data = $this->request;

        $creator = new LocationCreator(new LocationRegistryRepository);

        $location = $creator->handle($data);

        return $location;
    }
}
