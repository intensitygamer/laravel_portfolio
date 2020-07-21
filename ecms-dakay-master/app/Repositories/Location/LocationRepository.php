<?php

namespace App\Repositories\Location;

use App\Models\Location;
use Core\Repository;
use Doctrine\DBAL\Query\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LocationRepository implements Repository\Location\LocationRepository
{

    public function get_locations()
    {
        return Location::with(['created_by'])->toArray();
    }

    public function get_location_by_id($location_id)
    {
        return Location::with(['created_by'])->find($location_id)->toArray();
    }

    public function get_locations_list_by_key_id()
    {
        return Location::pluck('name','id');
    }

    public function save_location(array $data){
        DB::beginTransaction();
        try {
            $location = new Location;
            $location->user_id = Auth::user()->id;
            $location->name = $data['name'];
            $location->save();

            DB::commit();
        } catch(QueryException $e) {

            DB::rollback();
            throw new \Exception('Error saving location', 500);

        } catch (\Exception $e) {

            DB::rollback();
            throw new \Exception($e->getMessage(), 500);
        }
    }
    public function update_location($location_id, array $data){
        DB::beginTransaction();

        try {
            $data['user_id'] = Auth::user()->id;
            $location = Location::find($location_id);
            $location->update($data);

            DB::commit();
        } catch(QueryException $e) {

            DB::rollback();
            throw new \Exception('Error updating location', 500);

        } catch (\Exception $e) {

            DB::rollback();
            throw new \Exception($e->getMessage(), 500);
        }

    }
    public function delete_location($location_id){
        DB::beginTransaction();
        try {
            Location::find($location_id)->delete();
            DB::commit();
        } catch(QueryException $e) {

            DB::rollback();
            throw new \Exception('Error deleting location', 500);

        } catch (\Exception $e) {

            DB::rollback();
            throw new \Exception($e->getMessage(), 500);
        }
    }
}
