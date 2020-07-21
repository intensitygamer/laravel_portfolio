<?php

namespace Core\Repository\Equipment;

use Illuminate\Http\Request;

interface EquipmentAuditRepository
{
    public function audit_equipment(Request $data) : array;
    public function get_fuel_by_date($filter, $equipment_id);
    public function get_lubricant_by_date($filter, $equipment_id, $oil_id);
    public function get_no_of_repairs_by_date($filter, $equipment_id);
}
