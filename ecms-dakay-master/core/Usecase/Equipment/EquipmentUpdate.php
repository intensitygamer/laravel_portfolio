<?php

namespace Core\Usecase\Equipment;

use Core\Repository\Equipment\EquipmentUpdateRepository;
use Illuminate\Http\Request;

class EquipmentUpdate
{
    protected $repository;

    public function __construct(EquipmentUpdateRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle($id, Request $request)
    {
        return $this->repository->update_equipment($id, $request);
    }
}
