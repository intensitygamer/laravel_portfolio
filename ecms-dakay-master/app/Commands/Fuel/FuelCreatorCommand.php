<?php

namespace App\Commands\Fuel;

use App\Repositories\Fuel\FuelRepository;
use Core\Usecase\Fuel\FuelCreator;
use Illuminate\Http\Request;

class FuelCreatorCommand
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function execute()
    {
        $data = $this->request;

        $creator = new FuelCreator(new FuelRepository);

        $fuel = $creator->handle($data);

        return $fuel;
    }
}
