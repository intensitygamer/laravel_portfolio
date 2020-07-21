<?php

namespace Core\Usecase\Operator;

use Core\Repository\Operator\OperatorDeleteRepository;

class OperatorDelete
{
    protected $repository;

    public function __construct(OperatorDeleteRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle($id)
    {
        $this->repository->delete_operator($id);
    }
}