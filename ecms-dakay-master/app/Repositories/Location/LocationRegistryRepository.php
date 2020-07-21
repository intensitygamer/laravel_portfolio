<?php

namespace App\Repositories\Location;

use App\Models\Location;
use Core\Repository;
use Carbon\Carbon;

class LocationRegistryRepository implements Repository\Location\LocationRegistryRepository
{
    public function create_location(array $location) : array
    {
        $model = new Location;
        $model->name = $location['name'];
        $model->phone_no = $location['phone_no'];
        $model->address = $location['address'];
        $model->location_date = new Carbon($location['location_date']);
        $model->contact_person = $location['contact_person'];
        $model->created_user_id = \Auth::user()->id;

        $model->save();

        return $model->toArray();
    }
}
