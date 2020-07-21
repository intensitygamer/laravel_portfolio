<?php

namespace Core\Usecase\Operator;

use Core\Repository\Operator\OperatorRegistryRepository;

class OperatorCreator
{
    public function __construct(OperatorRegistryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle($operator)
    {

        $new_operator = $this->repository->create_operator([
            'name' => $operator->name,
            'alias' => $operator->alias,
            'license_no' => $operator->license_no,
            'driver_code' => $operator->driver_code,

            'operator_date' => $operator->operator_date,
            'address' => $operator->address,
            'phone_no' => $operator->phone_no,
            'created_user_id' => \Auth::user()->id,
        ]);

        return $new_operator;
    }
}