<?php

namespace Core\Usecase\Operator;

use Core\Repository\Operator\OperatorUpdateRepository;
use Illuminate\Http\Request;

class OperatorUpdate
{
    protected $repository;

    public function __construct(OperatorUpdateRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle($id, Request $request)
    {
        return $this->repository->update_operator($id, $request);
    }
}
