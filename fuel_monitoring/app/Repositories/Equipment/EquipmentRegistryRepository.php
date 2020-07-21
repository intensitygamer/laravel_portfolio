<?php

namespace App\Repositories\Equipment;

use App\Models\Equipment;
use App\Models\EquipmentImage;
use Core\Repository;
use Carbon\Carbon;
use DB;

class EquipmentRegistryRepository implements Repository\Equipment\EquipmentRegistryRepository
{
    public function create_equipment(array $equipment) : array
    {
        DB::beginTransaction();

        $model = new Equipment;
        $model->equipment_code = $equipment['equipment_code'];
        $model->equipment_date = new Carbon($equipment['equipment_date']);
        $model->equipment_description = $equipment['equipment_description'];
        $model->equipment_make = $equipment['equipment_make'];
        $model->equipment_model = $equipment['equipment_model'];
        $model->equipment_type = $equipment['equipment_type'];
        $model->capacity = $equipment['capacity'];
        $model->for_hauling = $equipment['for_hauling'];

        $model->engine_displacement = $equipment['engine_displacement'];
        $model->engine_code = $equipment['engine_code'];
        $model->engine_no = $equipment['engine_no'];
        $model->chassis_no = $equipment['chassis_no'];
        $model->body_no = $equipment['body_no'];
        $model->color = $equipment['color'];
        $model->fuel = $equipment['fuel'];

        $model->created_user_id = \Auth::user()->id;

        $model->save();

        $count = count($equipment['filename']);

        for($i=0; $i<$count; $i++) {
            $file = new EquipmentImage;
            $file->equipment_id = $model->id;
            $file->file_name = $equipment['filename'][$i];
            $file->file_url = $equipment['fileurl'][$i];
            $file->file_mime_type =  $equipment['mimetype'][$i];
            /**
             * move and save
             */
            \File::move('uploads/tmp/'.$equipment['fileurl'][$i], 'uploads/use/'.$equipment['fileurl'][$i]);
            $file->save();
        }

        DB::commit();

        return $model->toArray();
    }
}
