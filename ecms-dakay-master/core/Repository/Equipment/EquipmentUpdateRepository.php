<?php

namespace Core\Repository\Equipment;

use Illuminate\Http\Request;

interface EquipmentUpdateRepository
{
    public function update_equipment($equipment, Request $data) : array;
}
