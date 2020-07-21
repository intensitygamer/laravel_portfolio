<?php

namespace App\Transformers;

use App\Transformers\Transformer;

class SubContractorTransformer extends Transformer
{
    public function transform(array $equipment)
    {
        $name = sprintf("%s %s", $equipment['created_by']['first_name'], $equipment['created_by']['last_name']);

        return [
            'id' => (int) $equipment['id'],
            'name' => $equipment['name'],
            'address' => $equipment['address'],
            'contact_1' => $equipment['contact_1'],
            'contact_2' => $equipment['contact_2'],
            'website' => $equipment['website'],
            'created_at' => $equipment['created_at'],
            'created_by' => $name,
            'updated_at' => $equipment['updated_at']
        ];
    }
}
