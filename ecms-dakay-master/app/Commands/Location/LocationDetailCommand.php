<?php

namespace App\Commands\Location;

use App\Repositories\Location\LocationRepository;
use App\Transformers\LocationTransformer;
use Core\Usecase\Location\LocationDetail;

class LocationDetailCommand
{
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function execute()
    {
        $usecase = new LocationDetail(new LocationRepository);

        $location = $usecase->handle($this->id);

        $transformer = new LocationTransformer;

        return $transformer->transform_item($location);
    }
}