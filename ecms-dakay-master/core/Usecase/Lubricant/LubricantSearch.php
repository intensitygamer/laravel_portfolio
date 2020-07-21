<?php

namespace Core\Usecase\Lubricant;

use Core\Repository\Lubricant\LubricantRepository;

class LubricantSearch
{
    protected $repository;

    public function __construct(LubricantRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle($filters, $page = 1, $per_page = 15)
    {
        $lubricant = $this->repository->get_lubricants($filters, $page, $per_page);

        return $lubricant;
    }

    public function handlePE($filters)
    {
        $lubricant = $this->repository->get_pe_lubricants($filters);

        return $lubricant;
    }
}