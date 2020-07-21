<?php

namespace Core\Repository\SubContractor;

use Illuminate\Http\Request;

interface SubContractorUpdateRepository
{
    public function update_subcontractor($subcontractor, Request $data) : array;
}
