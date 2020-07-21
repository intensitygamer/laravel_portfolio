<?php

namespace App\Repositories\Location;

use App\Models\Location as LocationModel;

use Core\Domain\Entity\User as UserEntity;
use Core\Repository;

class LocationSearchRepository implements Repository\Location\LocationSearchRepository
{
    public function get_locations(array $filters, $page, $per_page) : array
    {
        $model = new LocationModel;
        $locations = $model->with(['created_by']);

        if (isset($filters['q']))
        {
            $locations->where(function($q) use ($filters) {
                $q->orWhere('name', 'like', '%'. $filters['q'] .'%');
            });
        }

        $locations->orderBy('id', 'desc');

        $locations = $locations->paginate($per_page);

        return $locations->toArray();
    }
}
