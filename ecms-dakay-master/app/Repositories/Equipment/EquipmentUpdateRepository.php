<?php

namespace App\Repositories\Equipment;

use App\Models\Equipment;
use App\Models\EquipmentImage;
use Core\Repository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

class EquipmentUpdateRepository implements Repository\Equipment\EquipmentUpdateRepository
{
    public function update_equipment($id, Request $data) : array
    {
        DB::beginTransaction();

        Equipment::where('id', $id)->update([
            'equipment_code' => $data->equipment_code,
            'equipment_date' => new Carbon($data->equipment_date),
            'equipment_description' => $data->equipment_description,
            'equipment_make' => $data->equipment_make,
            'equipment_model' => $data->equipment_model,
            'equipment_type' => $data->equipment_type,
            'capacity' => $data->capacity,
            'for_hauling' => $data->for_hauling,

            'engine_displacement' => $data->engine_displacement,
            'engine_code' => $data->engine_code,
            'engine_no' => $data->engine_no,
            'chassis_no' => $data->chassis_no,
            'body_no' => $data->body_no,
            'color' => $data->color,
            'fuel' => $data->fuel,
        ]);


        $count = count($data['filename']);

        for($i=0; $i<$count; $i++) {
            $file = new EquipmentImage;
            $file->equipment_id = $id;
            $file->file_name = $data['filename'][$i];
            $file->file_url = $data['fileurl'][$i];
            $file->file_mime_type =  $data['mimetype'][$i];
            /**
             * move and save
             */
            \File::move('uploads/tmp/'.$data['fileurl'][$i], 'uploads/use/'.$data['fileurl'][$i]);
            $file->save();
        }

        DB::commit();

        return Equipment::find($id)->toArray();
    }
}
