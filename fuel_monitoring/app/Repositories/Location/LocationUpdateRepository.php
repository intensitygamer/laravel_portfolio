<?php

namespace App\Repositories\Location;

use App\Models\Location;
use Core\Repository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LocationUpdateRepository implements Repository\Location\LocationUpdateRepository
{
    public function update_location($id, Request $data) : array
    {
        DB::beginTransaction();

        Location::where('id', $id)->update([
            'name' => $data->name,
            'address' => $data->address,
            'location_date' => new Carbon($data->location_date),
            'phone_no' => $data->phone_no,
            'contact_person' => $data->contact_person,
            'created_user_id' => \Auth::user()->id,
        ]);

        DB::commit();

        return Location::find($id)->toArray();
    }
}
