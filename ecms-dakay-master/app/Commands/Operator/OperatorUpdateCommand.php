<?php

namespace App\Commands\Operator;

use Illuminate\Http\Request;
use App\Repositories\Operator\OperatorUpdateRepository;
use Core\Usecase\Operator\OperatorUpdate;

class OperatorUpdateCommand
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
        $usecase = new OperatorUpdate(new OperatorUpdateRepository);

        return $usecase->handle($this->id, $this->request);
    }
}
