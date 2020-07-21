<?php

namespace App\Repositories\SubContractor;

use App\Models\SubContractor;
use Core\Repository;
use Doctrine\DBAL\Query\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SubContractorRepository implements Repository\SubContractor\SubContractorRepository
{

    public function get_subcontractors()
    {
        return SubContractor::with(['created_by'])->toArray();
    }

    public function get_subcontractor_by_id($subcontractor_id)
    {
        return SubContractor::with(['created_by'])->find($subcontractor_id)->toArray();
    }

    public function get_subcontractors_list_by_key_id()
    {
        return SubContractor::orderBy('name', 'asc')->pluck('name','id');
    }

    public function save_subcontractor(array $data){
        DB::beginTransaction();
        try {
            $subcontractor = new SubContractor;
            $subcontractor->user_id = Auth::user()->id;
            $subcontractor->name = $data['name'];
            $subcontractor->save();

            DB::commit();
        } catch(QueryException $e) {

            DB::rollback();
            throw new \Exception('Error saving subcontractor', 500);

        } catch (\Exception $e) {

            DB::rollback();
            throw new \Exception($e->getMessage(), 500);
        }
    }
    public function update_subcontractor($subcontractor_id, array $data){
        DB::beginTransaction();

        try {
            $data['user_id'] = Auth::user()->id;
            $subcontractor = SubContractor::find($subcontractor_id);
            $subcontractor->update($data);

            DB::commit();
        } catch(QueryException $e) {

            DB::rollback();
            throw new \Exception('Error updating subcontractor', 500);

        } catch (\Exception $e) {

            DB::rollback();
            throw new \Exception($e->getMessage(), 500);
        }

    }
    public function delete_subcontractor($subcontractor_id){
        DB::beginTransaction();
        try {
            SubContractor::find($subcontractor_id)->delete();
            DB::commit();
        } catch(QueryException $e) {

            DB::rollback();
            throw new \Exception('Error deleting subcontractor', 500);

        } catch (\Exception $e) {

            DB::rollback();
            throw new \Exception($e->getMessage(), 500);
        }
    }
}
