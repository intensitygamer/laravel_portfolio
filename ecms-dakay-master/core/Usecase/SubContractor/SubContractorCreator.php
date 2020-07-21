<?php

namespace Core\Usecase\SubContractor;

use Core\Repository\SubContractor\SubContractorRegistryRepository;

class SubContractorCreator
{
    public function __construct(SubContractorRegistryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle($subcontractor)
    {
        $new_subcontractor = $this->repository->create_subcontractor([
            'name' => $subcontractor->name,
            'address' => $subcontractor->address,
            'contact_1' => $subcontractor->contact_1,
            'contact_2' => $subcontractor->contact_2,
            'website' => $subcontractor->website,
            'created_user_id' => \Auth::user()->id,
        ]);

        return $new_subcontractor;
    }
}