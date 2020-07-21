<?php

namespace Core\Usecase\Equipment;

use Core\Repository\Equipment\EquipmentRepository;
use Core\Validator;
use Core\Exception;

class EquipmentDetail
{
    protected $repository;

    public function __construct(EquipmentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle($equipment_id)
    {
        $validator = new Validator;

        $validator->setup([ 'id' => $equipment_id]);

        $validator->add_rule('id', ['required']);

        if (! $validator->is_valid())
            throw new Exception\Validation($validator);

        $equipment = $this->repository->get_equipment_by_id($equipment_id);

        if (! $equipment)
            throw new Exception\UserNotExists('User do not exists');

        return $equipment;
    }
}
