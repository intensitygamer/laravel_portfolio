<?php

namespace Core\Usecase\Lubricant;

use Core\Repository\Lubricant\LubricantRepository;
use Core\Validator;
use Core\Exception;

class LubricantDetail
{
    protected $repository;

    public function __construct(LubricantRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle($lubricant_id)
    {
        $validator = new Validator;

        $validator->setup([ 'id' => $lubricant_id]);

        $validator->add_rule('id', ['required']);

        if (! $validator->is_valid())
            throw new Exception\Validation($validator);

        $lubricant = $this->repository->get_lubricant_by_id($lubricant_id);

        if (! $lubricant)
            throw new Exception\ReportsException('Lubricant do not exists');

        return $lubricant;
    }
}
