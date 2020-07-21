<?php

namespace App\Repositories\Operator;

use App\Models\Operator;
use Carbon\Carbon;
use Core\Repository;

class OperatorRegistryRepository implements Repository\Operator\OperatorRegistryRepository
{
    public function create_operator(array $operator) : array
    {

        $model = new Operator();
        $model->name = $operator['name'];
        $model->alias = $operator['alias'];
        $model->license_no = $operator['license_no'];
        $model->driver_code = $operator['driver_code'];

        $model->operator_date = new Carbon($operator['operator_date']);
        $model->address = $operator['address'];
        $model->phone_no = $operator['phone_no'];
        $model->created_user_id = \Auth::user()->id;

        $model->save();

        return $model->toArray();
    }
}
