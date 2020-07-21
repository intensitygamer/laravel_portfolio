<?php

namespace App\Transformers;

use App\Transformers\Transformer;

class LubricantTransformer extends Transformer
{
    public function transform(array $lubricant)
    {
        $created_name = sprintf("%s %s", $lubricant['created_by']['first_name'], $lubricant['created_by']['last_name']);
        $updated_name = sprintf("%s %s", $lubricant['updated_by']['first_name'], $lubricant['updated_by']['last_name']);

        return [
            'id' => (int) $lubricant['id'],

            'transaction_no' => $lubricant['transaction_no'],
            'transaction_date' => $lubricant['transaction_date'],
            'vendor' => ($lubricant['vendor'] ? $lubricant['vendor'] : ''),
            'reference_no' => ($lubricant['reference_no'] ? $lubricant['reference_no'] : ''),

            'in' => $lubricant['in'],
            'out' => $lubricant['out'],

            'type' => ($lubricant['out'] ? 'use' : 'stock'),

            'equipment' => ($lubricant['equipment'] ? $lubricant['equipment']['equipment_code'] : ''),
            'location' => ($lubricant['location'] ? $lubricant['location']['name'] : ''),
            'operator' => ($lubricant['operator'] ? $lubricant['operator']['name'] : ''),
            'project' => $lubricant['project'],
            'remarks' => $lubricant['remarks'],
            'type_of_oil' => $lubricant['type_of_oil']['name'],

            'total_consumption_per_unit' => $lubricant['total_consumption_per_unit'],
            'balance' => $lubricant['balance'],

            'created_by' => $created_name,
            'updated_by' => $updated_name,

            'equipment_id' => $lubricant['equipment']['id'],
            'operator_id' => $lubricant['operator']['id'],
            'location_id' => $lubricant['location']['id'],
            'type_of_oil_id' => $lubricant['type_of_oil']['id'],

            'created_at' => $lubricant['created_at'],
            'updated_at' => $lubricant['updated_at']
        ];
    }
}
