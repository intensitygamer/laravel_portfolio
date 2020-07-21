<?php

namespace App\Commands\Operator;

use App\Repositories\Operator\OperatorRegistryRepository;
use Core\Usecase\Operator\OperatorCreator;
use Illuminate\Http\Request;

class OperatorCreatorCommand
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function execute()
    {

        $data = $this->request;

        $creator = new OperatorCreator(new OperatorRegistryRepository);

        $location = $creator->handle($data);

        return $location;
    }
}
