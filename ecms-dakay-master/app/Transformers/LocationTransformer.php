<?php

namespace App\Transformers;

use App\Transformers\Transformer;

class LocationTransformer extends Transformer
{
    public function transform(array $location)
    {
        $name = sprintf("%s %s", $location['created_by']['first_name'], $location['created_by']['last_name']);

        return [
            'id' => (int) $location['id'],
            'name' => $location['name'],
            'phone_no' => $location['phone_no'],
            'location_date' => $location['location_date'],
            'address' => $location['address'],
            'contact_person' => $location['contact_person'],
            'created_at' => $location['created_at'],
            'created_by' => $name,
            'updated_at' => $location['updated_at']
        ];
    }
}
