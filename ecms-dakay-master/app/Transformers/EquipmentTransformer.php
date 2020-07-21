<?php

namespace App\Transformers;

use App\Transformers\Transformer;

class EquipmentTransformer extends Transformer
{
    public function transform(array $equipment)
    {
        $no_of_repair = 0;
        $total_repair_cost = 0;

        $total_engine_oil = 0;
        $total_hydraulic_oil = 0;
        $total_gear_oil = 0;
        $total_telluse_oil = 0;

        $fuel_oil = 0;
        $no_of_hours = 0;
        $millage = 0;
        $location_name = '';
        $equipment_images = [];

        $name = sprintf("%s %s", $equipment['created_by']['first_name'], $equipment['created_by']['last_name']);

        if(!empty($equipment['subcontractor_works'])){
            $no_of_repair = $equipment['subcontractor_works'][0]['number_of_repair'];
            $total_repair_cost = $equipment['subcontractor_works'][0]['contract_amount'];
        }

        if(!empty($equipment['lubricant_engine_oil'])){
            $total_engine_oil = $equipment['lubricant_engine_oil'][0]['total'];
        }

        if(!empty($equipment['lubricant_hydraulic_oil'])){
            $total_hydraulic_oil = $equipment['lubricant_hydraulic_oil'][0]['total'];
        }

        if(!empty($equipment['lubricant_gear_oil'])){
            $total_gear_oil = $equipment['lubricant_gear_oil'][0]['total'];
        }

        if(!empty($equipment['lubricant_telluse_oil'])){
            $total_telluse_oil = $equipment['lubricant_telluse_oil'][0]['total'];
        }

        if(!empty($equipment['fuel_oil'])){
            $fuel_oil = $equipment['fuel_oil'][0]['total'];
        }

        if(!empty($equipment['latest_location'])){
            $location_name = $equipment['latest_location'][0]['name'];
        }

        if(!empty($equipment['no_of_hours'])){
            $no_of_hours = $equipment['no_of_hours'][0]['total_no_of_hours'];
        }

        if(!empty($equipment['millage'])){
            $millage = $equipment['millage'][0]['millage'];
        }

        if(isset($equipment['equipment_images']) && $equipment['equipment_images'] && !empty($equipment['equipment_images'])){
            $equipment_images = $equipment['equipment_images'];
        }

        return [
            'id' => (int) $equipment['id'],
            'equipment_code' => $equipment['equipment_code'],
            'equipment_date' => $equipment['equipment_date'],
            'equipment_description' => $equipment['equipment_description'],
            'equipment_make' => $equipment['equipment_make'],
            'equipment_model' => $equipment['equipment_model'],
            'equipment_type' => $equipment['equipment_type'],
            'for_hauling' => $equipment['for_hauling'],

            'engine_displacement' => $equipment['engine_displacement'],
            'engine_code' => $equipment['engine_code'],
            'engine_no' => $equipment['engine_no'],
            'chassis_no' => $equipment['chassis_no'],
            'body_no' => $equipment['body_no'],
            'color' => $equipment['color'],
            'fuel' => $equipment['fuel'],

            'latest_location' => $location_name,
            'no_of_hours' => $no_of_hours,
            'millage' => $millage,

            'total_fuel_oil' => $fuel_oil,
            'total_engine_oil' => $total_engine_oil,
            'total_hydraulic_oil' => $total_hydraulic_oil,
            'total_gear_oil' => $total_gear_oil,
            'total_telluse_oil' => $total_telluse_oil,

            'no_of_repairs' => $no_of_repair,
            'total_repair_cost' => $total_repair_cost,

            'equipment_images' => $equipment_images,

            'status' => $equipment['status'],
            'capacity' => $equipment['capacity'],
            'created_at' => $equipment['created_at'],
            'created_by' => $name,
            'updated_at' => $equipment['updated_at']
        ];
    }
}
