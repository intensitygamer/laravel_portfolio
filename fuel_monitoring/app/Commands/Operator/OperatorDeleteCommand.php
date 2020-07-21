<?php

namespace App\Commands\Operator;

use App\Repositories\Operator\OperatorDeleteRepository;
use Core\Usecase\Operator\OperatorDelete;

class OperatorDeleteCommand
{
    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function execute()
    {
        $usecase = new OperatorDelete(new OperatorDeleteRepository);

        $usecase->handle($this->id);
    }
}
