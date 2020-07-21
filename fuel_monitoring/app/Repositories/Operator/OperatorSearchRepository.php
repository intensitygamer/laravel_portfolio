<?php

namespace App\Repositories\Operator;

use App\Models\Operator;

use Core\Repository;

class OperatorSearchRepository implements Repository\Operator\OperatorSearchRepository
{
    public function get_operators(array $filters, $page, $per_page) : array
    {
        $model = new Operator;
        $operator = $model->with(['created_by']);

        if (isset($filters['q']))
        {
            $operator->where(function($q) use ($filters) {
                $q->orWhere('name', 'like', '%'. $filters['q'] .'%');
                $q->orWhere('alias', 'like', '%'. $filters['q'] .'%');
                $q->orWhere('license_no', 'like', '%'. $filters['q'] .'%');
                $q->orWhere('driver_code', 'like', '%'. $filters['q'] .'%');
            });
        }

        $operator->orderBy('id', 'desc');

        $operator = $operator->paginate($per_page);

        return $operator->toArray();
    }
}
