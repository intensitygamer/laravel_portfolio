<?php

namespace Core\Usecase\Operator;

use Core\Repository\Operator\OperatorSearchRepository;

class OperatorSearch
{
    protected $repository;

    public function __construct(OperatorSearchRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle($filters, $page = 1, $per_page = 15)
    {
        $locations = $this->repository->get_operators($filters, $page, $per_page);

        return $locations;
    }
}