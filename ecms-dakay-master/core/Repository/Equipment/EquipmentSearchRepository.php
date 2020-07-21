<?php

namespace Core\Repository\Equipment;

interface EquipmentSearchRepository
{
    public function get_equipments(array $filters, $page, $per_page) : array;
}