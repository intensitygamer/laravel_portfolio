<?php

namespace App\Commands\Equipment;

use Illuminate\Http\Request;
use App\Repositories\Equipment\EquipmentAuditRepository;
use App\Transformers\EquipmentTransformer;
use Core\Usecase\Equipment\EquipmentAudit;

class EquipmentAuditCommand
{
    private $data;
    protected $request;

    public function __construct(Request $request)
    {
        $this->data = $request->all();
        $this->request = $request;
    }

    public function execute()
    {
        $usecase = new EquipmentAudit(new EquipmentAuditRepository);

        $equipment = $usecase->handle($this->request);

        $transformer = new EquipmentTransformer;

        return $transformer->transform_item($equipment);

    }
}
