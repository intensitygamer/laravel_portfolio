<?php

namespace App\Repositories\SubContractor;

use App\Models\SubContractor as SubContractorModel;

use Core\Repository;

class SubContractorSearchRepository implements Repository\SubContractor\SubContractorSearchRepository
{
    public function get_subcontractors(array $filters, $page, $per_page) : array
    {
        $model = new SubContractorModel;
        $subcontractors = $model->with(['created_by']);

        if (isset($filters['q']))
        {
            $subcontractors->where(function($q) use ($filters) {
                $q->orWhere('name', 'like', '%'. $filters['q'] .'%');
                $q->orWhere('contact_1', 'like', '%'. $filters['q'] .'%');
                $q->orWhere('contact_2', 'like', '%'. $filters['q'] .'%');
                $q->orWhere('address', 'like', '%'. $filters['q'] .'%');
            });
        }

        $subcontractors->orderBy('id', 'desc');

        $subcontractors = $subcontractors->paginate($per_page);

        return $subcontractors->toArray();
    }
}
