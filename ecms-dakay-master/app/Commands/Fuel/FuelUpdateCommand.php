<?php

namespace App\Commands\Fuel;

use Illuminate\Http\Request;
use App\Repositories\Fuel\FuelRepository;
use Core\Usecase\Fuel\FuelUpdate;

class FuelUpdateCommand
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
        $usecase = new FuelUpdate(new FuelRepository);

        return $usecase->handle($this->id, $this->request);
    }
}
