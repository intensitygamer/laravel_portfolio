<?php

namespace App\Transformers;

use App\Transformers\Transformer;

class FuelTransformer extends Transformer
{
    public function transform(array $fuel)
    {
        $created_name = sprintf("%s %s", $fuel['created_by']['first_name'], $fuel['created_by']['last_name']);
        $updated_name = sprintf("%s %s", $fuel['updated_by']['first_name'], $fuel['updated_by']['last_name']);

        return [
            'id' => (int) $fuel['id'],

            'transaction_no' => $fuel['transaction_no'],
            'transaction_date' => $fuel['transaction_date'],
            'transaction_time' => ($fuel['transaction_time'] ? $fuel['transaction_time'] : ''),
            'millage' => ($fuel['millage'] ? $fuel['millage'] : ''),
            'no_of_hours' => ($fuel['no_of_hours'] ? $fuel['no_of_hours'] : ''),
            'vendor' => ($fuel['vendor'] ? $fuel['vendor'] : ''),
            'reference_no' => ($fuel['reference_no'] ? $fuel['reference_no'] : ''),

            'in' => $fuel['in'],
            'out' => $fuel['out'],

            'type' => ($fuel['out'] ? 'use' : 'stock'),

            'equipment' => ($fuel['equipment'] ? $fuel['equipment']['equipment_code'] : ''),
            'location' => ($fuel['location'] ? $fuel['location']['name'] : ''),
            'operator' => ($fuel['operator'] ? $fuel['operator']['name'] : ''),
             'remarks' => $fuel['remarks'],

            'total_consumption_per_unit' => $fuel['total_consumption_per_unit'],
            'balance' => $fuel['balance'],

            'created_by' => $created_name,
            'updated_by' => $updated_name,

            'equipment_id' => $fuel['equipment']['id'],
            'operator_id' => $fuel['operator']['id'],
            'location_id' => $fuel['location']['id'],

            'project_id' => $fuel['project']['id'],
 
            
             'project' => ($fuel['project'] ? $fuel['project']['name'] : ''),

            'created_at' => $fuel['created_at'],
            'updated_at' => $fuel['updated_at']
        ];
    }
}
