<?php

namespace Core\Usecase\SubContractor;

use Core\Repository\SubContractor\SubContractorRepository;
use Core\Validator;
use Core\Exception;

class SubContractorDetail
{
    protected $repository;

    public function __construct(SubContractorRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle($subcontractor_id)
    {
        $validator = new Validator;

        $validator->setup([ 'id' => $subcontractor_id]);

        $validator->add_rule('id', ['required']);

        if (! $validator->is_valid())
            throw new Exception\Validation($validator);

        $subcontractor = $this->repository->get_subcontractor_by_id($subcontractor_id);

        if (! $subcontractor)
            throw new Exception\UserNotExists('Sub Contractor do not exists');

        return $subcontractor;
    }
}
