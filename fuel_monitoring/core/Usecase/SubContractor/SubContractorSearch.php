<?php

namespace Core\Usecase\SubContractor;

use Core\Repository\SubContractor\SubContractorSearchRepository;

class SubContractorSearch
{
    protected $repository;

    public function __construct(SubContractorSearchRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle($filters, $page = 1, $per_page = 15)
    {
        $subcontractors = $this->repository->get_subcontractors($filters, $page, $per_page);

        return $subcontractors;
    }
}