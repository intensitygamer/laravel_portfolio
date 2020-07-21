<?php

namespace Core\Usecase\Equipment;

use Core\Repository\Equipment\EquipmentSearchRepository;

class EquipmentSearch
{
    protected $repository;

    public function __construct(EquipmentSearchRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle($filters, $page = 1, $per_page = 15)
    {
        $equipments = $this->repository->get_equipments($filters, $page, $per_page);

        return $equipments;
    }
}