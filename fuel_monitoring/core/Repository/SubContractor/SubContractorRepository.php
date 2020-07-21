<?php

namespace Core\Repository\SubContractor;

interface SubContractorRepository
{
    public function get_subcontractors();
    public function get_subcontractor_by_id($subcontractor_id);
    public function save_subcontractor(array $subcontractor);
    public function update_subcontractor($subcontractor_id, array $subcontractor);
    public function delete_subcontractor($subcontractor_id);

}