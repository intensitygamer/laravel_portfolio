<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class Equipment extends Model
{
    protected $table = 'equipments';

    use SoftDeletes;

    protected $fillable = [ 'id',
        'equipment_code',
        'equipment_date',
        'equipment_description',
        'equipment_make',
        'equipment_model',
        'equipment_type',
        'capacity',
        'for_hauling',
        'engine_displacement',
        'engine_code',
        'engine_no',
        'chassis_no',
        'body_no',
        'color',
        'fuel',
        'status',
        'created_user_id' ];

    public function created_by()
    {
        return $this->belongsTo('App\Models\User', 'created_user_id');
    }

    public function equipment_images()
    {
        return $this->hasMany('App\Models\EquipmentImage','equipment_id');
    }

    public function subcontractor()
    {
        return $this->hasMany('App\Models\SubContractorWork','equipment');
    }

    public function subcontractor_works()
    {
        return $this->subcontractor()
            ->selectRaw('subcontractorworks.equipment, count(subcontractorworks.id) as number_of_repair, sum(IFNULL(subcontractorworks.contract_amount, 0)) as contract_amount')
            ->groupBy('equipment');
    }

    public function lubricant()
    {
        return $this->hasMany('App\Models\LubricantMonitoring','equipment');
    }

    public function lubricant_engine_oil()
    {
        return $this->lubricant()
            ->selectRaw('lubricant_monitoring.equipment, sum(IFNULL(lubricant_monitoring.out, 0)) as total')
            ->where('type_of_oil_id', \App\Models\Monitoring::ENGINE_OIL_ID)
            ->groupBy('equipment');
    }

    public function lubricant_hydraulic_oil()
    {
        return $this->lubricant()
            ->selectRaw('lubricant_monitoring.equipment, sum(IFNULL(lubricant_monitoring.out, 0)) as total')
            ->where('type_of_oil_id', \App\Models\Monitoring::HYDRAULIC_OIL_ID)
            ->groupBy('equipment');
    }

    public function lubricant_gear_oil()
    {
        return $this->lubricant()
            ->selectRaw('lubricant_monitoring.equipment, sum(IFNULL(lubricant_monitoring.out, 0)) as total')
            ->where('type_of_oil_id', \App\Models\Monitoring::GEAR_OIL_ID)
            ->groupBy('equipment');
    }

    public function lubricant_telluse_oil()
    {
        return $this->lubricant()
            ->selectRaw('lubricant_monitoring.equipment, sum(IFNULL(lubricant_monitoring.out, 0)) as total')
            ->where('type_of_oil_id', \App\Models\Monitoring::TELLUSE_ID)
            ->groupBy('equipment');
    }

    public function fuel()
    {
        return $this->hasMany('App\Models\FuelMonitoring','equipment');
    }

    public function fuel_oil()
    {
        return $this->fuel()
            ->selectRaw('fuel_monitoring.equipment, sum(IFNULL(fuel_monitoring.out, 0)) as total')
            ->groupBy('equipment');
    }

    public function no_of_hours()
    {
        return $this->fuel()
            ->selectRaw('fuel_monitoring.equipment, sum(IFNULL(fuel_monitoring.no_of_hours, 0)) as total_no_of_hours')
            ->groupBy('equipment');
    }

    public function millage()
    {
        return $this->fuel()
            ->selectRaw('fuel_monitoring.equipment as equipment, MAX(fuel_monitoring.millage) as millage ')
            ->groupBy('equipment');
    }

    public function latest_location()
    {
        return $this->fuel()
            ->join('locations','locations.id','=','fuel_monitoring.location')
            ->selectRaw('fuel_monitoring.equipment as equipment, MAX(locations.name) as name ')
            ->groupBy('equipment');
    }


}