<?php

namespace Core\Usecase\Equipment;

use Core\Repository\Equipment\EquipmentDeleteRepository;

class EquipmentDelete
{
    protected $repository;

    public function __construct(EquipmentDeleteRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle($id)
    {
        $this->repository->delete_equipment($id);
    }
}