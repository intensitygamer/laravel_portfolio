<?php

namespace App\Commands\Operator;

use App\Repositories\Operator\OperatorRepository;
use App\Transformers\OperatorTransformer;
use Core\Usecase\Operator\OperatorDetail;

class OperatorDetailCommand
{
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function execute()
    {
        $usecase = new OperatorDetail(new OperatorRepository);

        $location = $usecase->handle($this->id);

        $transformer = new OperatorTransformer;

        return $transformer->transform_item($location);
    }
}