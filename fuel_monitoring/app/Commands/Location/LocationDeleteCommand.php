<?php

namespace App\Commands\Location;

use App\Models\Location;
use App\Repositories\Location\LocationDeleteRepository;
use Core\Usecase\Location\LocationDelete;

class LocationDeleteCommand
{
    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function execute()
    {
        $usecase = new LocationDelete(new LocationDeleteRepository);

        $usecase->handle($this->id);
    }
}
