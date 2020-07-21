<?php

namespace App\Commands\Location;

use Illuminate\Http\Request;
use App\Repositories\Location\LocationUpdateRepository;
use Core\Usecase\Location\LocationUpdate;

class LocationUpdateCommand
{
    private $id;
    private $data;
    protected $request;

    public function __construct($id, Request $request)
    {
        $this->id = $id;
        $this->data = $request->all();
        $this->request = $request;
    }

    public function execute()
    {
        $usecase = new LocationUpdate(new LocationUpdateRepository);

        return $usecase->handle($this->id, $this->request);
    }
}
