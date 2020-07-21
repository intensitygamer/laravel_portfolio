<?php

namespace App\Commands\Equipment;

use App\Repositories\Fuel\FuelRepository;
use Core\Usecase\Fuel\FuelDelete;
use Illuminate\Http\Request;

class FuelDeleteCommand
{
    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function execute()
    {
        $usecase = new FuelDelete(new FuelDeleteRepository);

        $usecase->handle($this->id);
    }
}
