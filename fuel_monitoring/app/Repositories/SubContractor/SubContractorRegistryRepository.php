<?php

namespace App\Repositories\SubContractor;

use App\Models\SubContractor;
use Core\Repository;

class SubContractorRegistryRepository implements Repository\SubContractor\SubContractorRegistryRepository
{
    public function create_subcontractor(array $subcontractor) : array
    {
        $model = new SubContractor;
        $model->name = $subcontractor['name'];
        $model->address = $subcontractor['address'];
        $model->contact_1 = $subcontractor['contact_1'];
        $model->contact_2 = $subcontractor['contact_2'];
        $model->website = $subcontractor['website'];
        $model->created_user_id = \Auth::user()->id;

        $model->save();

        return $model->toArray();
    }
}
