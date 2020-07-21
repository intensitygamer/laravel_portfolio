<?php

namespace App\Transformers;

use App\Transformers\Transformer;

class OperatorTransformer extends Transformer
{
    public function transform(array $operator)
    {
        $created_by_name = sprintf("%s %s", $operator['created_by']['first_name'], $operator['created_by']['last_name']);

        return [
            'id' => (int) $operator['id'],
            'name' => $operator['name'],
            'alias' => $operator['alias'],
            'license_no' => $operator['license_no'],
            'driver_code' => $operator['driver_code'],
            'operator_date' => $operator['operator_date'],
            'address' => $operator['address'],
            'phone_no' => $operator['phone_no'],
            'created_by' => $created_by_name,
            'created_at' => $operator['created_at'],
            'updated_at' => $operator['updated_at']
        ];
    }
}
