<?php

namespace Core\Usecase\Operator;

use Core\Repository\Operator\OperatorRepository;
use Core\Validator;
use Core\Exception;

class OperatorDetail
{
    protected $repository;

    public function __construct(OperatorRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle($operator_id)
    {
        $validator = new Validator;

        $validator->setup([ 'id' => $operator_id]);

        $validator->add_rule('id', ['required']);

        if (! $validator->is_valid())
            throw new Exception\Validation($validator);

        $location = $this->repository->get_operator_by_id($operator_id);

        if (! $location)
            throw new Exception\UserNotExists('Operator do not exists');

        return $location;
    }
}
