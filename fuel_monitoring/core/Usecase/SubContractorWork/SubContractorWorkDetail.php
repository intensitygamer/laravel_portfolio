<?php

namespace Core\Usecase\SubContractorWork;

use Core\Repository\SubContractorWork\SubContractorWorkRepository;
use Core\Validator;
use Core\Exception;

class SubContractorWorkDetail
{
    protected $repository;

    public function __construct(SubContractorWorkRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle($subcontractor_work_id)
    {
        $validator = new Validator;

        $validator->setup([ 'id' => $subcontractor_work_id]);

        $validator->add_rule('id', ['required']);

        if (! $validator->is_valid())
            throw new Exception\Validation($validator);

        $subonctractorwork = $this->repository->get_subcontractor_work_by_id($subcontractor_work_id);


        if (! $subonctractorwork)
            throw new Exception\ReportsException('SubContractor Work do not exists');

        return $subonctractorwork;
    }
}
