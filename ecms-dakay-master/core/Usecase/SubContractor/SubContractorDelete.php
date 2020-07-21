<?php

namespace Core\Usecase\SubContractor;

use Core\Repository\SubContractor\SubContractorDeleteRepository;

class SubContractorDelete
{
    protected $repository;

    public function __construct(SubContractorDeleteRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle($id)
    {
        $this->repository->delete_subcontractor($id);
    }
}