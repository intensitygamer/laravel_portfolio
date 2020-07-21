<?php

namespace Core\Usecase\Equipment;

use Core\Repository\Equipment\EquipmentAuditRepository;
use Illuminate\Http\Request;

class EquipmentAudit
{
    protected $repository;

    public function __construct(EquipmentAuditRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle(Request $request)
    {
        return $this->repository->audit_equipment($request);
    }
}
