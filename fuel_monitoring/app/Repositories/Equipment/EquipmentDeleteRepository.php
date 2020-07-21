<?php

namespace App\Repositories\Equipment;

use App\Models\Equipment;
use Core\Repository;


class EquipmentDeleteRepository implements Repository\Equipment\EquipmentDeleteRepository
{
    public function delete_equipment($id)
    {
        $equipment = Equipment::where('id',$id)->forceDelete();
    }
}