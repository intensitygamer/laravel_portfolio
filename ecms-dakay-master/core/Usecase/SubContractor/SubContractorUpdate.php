<?php

namespace Core\Usecase\SubContractor;

use Core\Repository\SubContractor\SubContractorUpdateRepository;
use Illuminate\Http\Request;

class SubContractorUpdate
{
    protected $repository;

    public function __construct(SubContractorUpdateRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle($id, Request $request)
    {
        return $this->repository->update_subcontractor($id, $request);
    }
}
