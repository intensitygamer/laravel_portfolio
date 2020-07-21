<?php

namespace Core\Repository\SubContractor;

interface SubContractorSearchRepository
{
    public function get_subcontractors(array $filters, $page, $per_page) : array;
}