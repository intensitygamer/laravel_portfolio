<?php

namespace Core\Usecase\SubContractorWork;

use Core\Repository\SubContractorWork\SubContractorWorkRepository;

class SubContractorWorkAudit
{
    protected $repository;

    public function __construct(SubContractorWorkRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle($filters, $page = 1, $per_page = 15)
    {
        $subcontractor_work = $this->repository->get_subcontractor_works_by_search_id($filters, $page, $per_page);

        return $subcontractor_work;
    }
}