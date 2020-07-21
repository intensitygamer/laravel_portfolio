<?php

namespace Core\Repository\Equipment;

interface EquipmentRepository
{
    public function get_equipments();
    public function get_equipment_by_id($equipment_id);
    public function save_equipment(array $equipment);
    public function update_equipment($equipment_id, array $equipment);
    public function delete_equipment($equipment_id);

}