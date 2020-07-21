<?php

namespace App\Commands\Lubricant;

use App\Repositories\Lubricant\LubricantRepository;
use App\Transformers\LubricantTransformer;
use Core\Usecase\Lubricant\LubricantDetail;

class LubricantDetailCommand
{
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function execute()
    {
        $usecase = new LubricantDetail(new LubricantRepository);

        $lubricant = $usecase->handle($this->id);

        $transformer = new LubricantTransformer;

        return $transformer->transform_item($lubricant);
    }
}