<?php

namespace App\Commands\Equipment;

use App\Repositories\Equipment\EquipmentRepository;
use App\Transformers\EquipmentTransformer;
use Core\Usecase\Equipment\EquipmentDetail;

class EquipmentDetailCommand
{
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function execute()
    {
        $usecase = new EquipmentDetail(new EquipmentRepository);

        $equipment = $usecase->handle($this->id);

        $transformer = new EquipmentTransformer;

        return $transformer->transform_item($equipment);
    }
}