<?php

namespace App\Commands\Fuel;

use App\Repositories\Fuel\FuelRepository;
use App\Transformers\FuelTransformer;
use Core\Usecase\Fuel\FuelDetail;

class FuelDetailCommand
{
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function execute()
    {
        $usecase = new FuelDetail(new FuelRepository);

        $fuel = $usecase->handle($this->id);

        $transformer = new FuelTransformer;

        return $transformer->transform_item($fuel);
    }
}