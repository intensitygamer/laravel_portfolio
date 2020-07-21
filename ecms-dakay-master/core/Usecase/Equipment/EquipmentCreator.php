<?php

namespace Core\Usecase\Equipment;

use Core\Repository\Equipment\EquipmentRegistryRepository;

class EquipmentCreator
{
    public function __construct(EquipmentRegistryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle($equipment)
    {
        $new_equipment = $this->repository->create_equipment([
            'equipment_code' => $equipment->equipment_code,
            'equipment_date' => $equipment->equipment_date,
            'equipment_description' => $equipment->equipment_description,
            'equipment_make' => $equipment->equipment_make,
            'equipment_model' => $equipment->equipment_model,
            'equipment_type' => $equipment->equipment_type,
            'capacity' => $equipment->capacity,
            'for_hauling' => $equipment->for_hauling,

            'engine_displacement' => $equipment->engine_displacement,
            'engine_code' => $equipment->engine_code,
            'engine_no' => $equipment->engine_no,
            'chassis_no' => $equipment->chassis_no,
            'body_no' => $equipment->body_no,
            'color' => $equipment->color,
            'fuel' => $equipment->fuel,

            'filename' => $equipment->filename,
            'fileurl' => $equipment->fileurl,
            'mimetype' => $equipment->mimetype,

            'created_user_id' => \Auth::user()->id,
        ]);

        return $new_equipment;
    }
}