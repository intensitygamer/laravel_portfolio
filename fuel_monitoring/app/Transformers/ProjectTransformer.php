<?php

namespace App\Transformers;

use App\Transformers\Transformer;

class ProjectTransformer extends Transformer
{
    public function transform(array $project)
    {
        // $name = sprintf("%s %s", $location['created_by']['first_name'], $location['created_by']['last_name']);

        return [
            'id' => (int) $project['id'],
            'name' => $project['name'],
            'location' => ($project['location'] ? $project['location'] : ''),
            'created_at' => $project['created_at'],
            'updated_at' => $project['updated_at'],
            'deleted_at' => $project['deleted_at']
        ];
    }
}
