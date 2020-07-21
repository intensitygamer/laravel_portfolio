<?php

namespace Core\Repository\SubContractor;

interface SubContractorRegistryRepository
{
    public function create_subcontractor(array $subcontractor) : array;
}