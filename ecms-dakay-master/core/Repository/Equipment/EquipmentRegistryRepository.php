<?php

namespace Core\Repository\Equipment;

interface EquipmentRegistryRepository
{
    public function create_equipment(array $equipment) : array;
}