<?php

namespace App\Repositories\Equipment;

use App\Models\Equipment;
use Core\Repository;
use Doctrine\DBAL\Query\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EquipmentRepository implements Repository\Equipment\EquipmentRepository
{

    public function get_equipments()
    {
        return Equipment::with(['created_by'])->toArray();
    }

    public function get_equipment_by_id($equipment_id)
    {
        return Equipment::with(['created_by', 'equipment_images'])->find($equipment_id)->toArray();
    }

    public function get_equipments_list_by_key_id()
    {
        return Equipment::orderBy('equipment_code', 'asc')->pluck('equipment_code','id');
    }

    public function save_equipment(array $data){
        DB::beginTransaction();
        try {
            $equipment = new Equipment;
            $equipment->user_id = Auth::user()->id;
            $equipment->name = $data['name'];
            $equipment->save();

            DB::commit();
        } catch(QueryException $e) {

            DB::rollback();
            throw new \Exception('Error saving equipment', 500);

        } catch (\Exception $e) {

            DB::rollback();
            throw new \Exception($e->getMessage(), 500);
        }
    }
    public function update_equipment($equipment_id, array $data){
        DB::beginTransaction();

        try {
            $data['user_id'] = Auth::user()->id;
            $equipment = Equipment::find($equipment_id);
            $equipment->update($data);

            DB::commit();
        } catch(QueryException $e) {

            DB::rollback();
            throw new \Exception('Error updating equipment', 500);

        } catch (\Exception $e) {

            DB::rollback();
            throw new \Exception($e->getMessage(), 500);
        }

    }
    public function delete_equipment($equipment_id){
        DB::beginTransaction();
        try {
            Equipment::find($equipment_id)->delete();
            DB::commit();
        } catch(QueryException $e) {

            DB::rollback();
            throw new \Exception('Error deleting equipment', 500);

        } catch (\Exception $e) {

            DB::rollback();
            throw new \Exception($e->getMessage(), 500);
        }
    }
}
