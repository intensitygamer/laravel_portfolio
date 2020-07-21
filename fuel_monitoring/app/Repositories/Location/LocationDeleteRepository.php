<?php

namespace App\Repositories\Location;

use App\Models\Location;
use Core\Repository;


class LocationDeleteRepository implements Repository\Location\LocationDeleteRepository
{
    public function delete_location($id)
    {
        $location = Location::where('id',$id)->forceDelete();
    }
}
