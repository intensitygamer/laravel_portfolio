<?php

namespace App\Repositories\Operator;

use App\Models\Operator;
use Core\Repository;
use Doctrine\DBAL\Query\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OperatorRepository implements Repository\Operator\OperatorRepository
{

    public function get_operators()
    {
        return Operator::with(['created_by'])->toArray();
    }

    public function get_operator_by_id($location_id)
    {
        return Operator::with(['created_by'])->find($location_id)->toArray();
    }

    public function get_operators_list_by_key_id()
    {
        return Operator::pluck('name','id');
    }

    public function save_operator(array $data){
        DB::beginTransaction();
        try {
            $location = new Operator;
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
    public function update_operator($location_id, array $data){
        DB::beginTransaction();

        try {
            $data['user_id'] = Auth::user()->id;
            $location = Operator::find($location_id);
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
    public function delete_operator($location_id){
        DB::beginTransaction();
        try {
            Operator::find($location_id)->delete();
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
