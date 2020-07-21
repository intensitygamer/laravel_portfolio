<?php

namespace App\Repositories\SubContractor;

use App\Models\SubContractor;
use Core\Repository;


class SubContractorDeleteRepository implements Repository\SubContractor\SubContractorDeleteRepository
{
    public function delete_subcontractor($id)
    {
        $subcontractor = SubContractor::where('id',$id)->forceDelete();
    }
}