<?php

namespace App\Repositories\Equipment;

use App\Models\Equipment as EquipmentModel;
use App\Models\EquipmentImage;
use App\Models\SubContractorWork;
use DB;

use Core\Repository;

class EquipmentSearchRepository implements Repository\Equipment\EquipmentSearchRepository
{
    public function get_equipments(array $filters, $page, $per_page) : array
    {
        $model = new EquipmentModel;
        $equipments = $model->with([
            'created_by',
            'subcontractor_works',
            'lubricant_engine_oil',
            'lubricant_hydraulic_oil',
            'lubricant_gear_oil',
            'lubricant_telluse_oil',
            'fuel_oil',
            'latest_location',
            'no_of_hours',
            'millage',
            ]);

        if (isset($filters['make']))
        {
            $equipments->where('equipment_make', 'like', '%'. $filters['make'] .'%');
        }

        if (isset($filters['type']))
        {
            $equipments->where('equipment_type', 'like', '%'. $filters['type'] .'%');
        }

        if (isset($filters['model']))
        {
            $equipments->where('equipment_model', 'like', '%'. $filters['model'] .'%');
        }

        if (isset($filters['hauling']))
        {
            $equipments->where('for_hauling', 'like', '%'. $filters['hauling'] .'%');
        }

        if (isset($filters['code']))
        {
            $equipments->where('equipment_code', 'like', '%'. $filters['code'] .'%');
        }

        $equipments->orderBy('id', 'desc');

        $equipments = $equipments->paginate($per_page);

        return $equipments->toArray();
    }
}
