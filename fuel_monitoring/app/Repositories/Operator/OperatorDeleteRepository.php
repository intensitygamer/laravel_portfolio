<?php

namespace App\Repositories\Operator;

use App\Models\Operator;
use Core\Repository;


class OperatorDeleteRepository implements Repository\Operator\OperatorDeleteRepository
{
    public function delete_operator($id)
    {
        $operator = Operator::where('id',$id)->forceDelete();
    }
}
