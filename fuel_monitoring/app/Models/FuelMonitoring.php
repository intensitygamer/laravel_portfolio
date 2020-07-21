<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FuelMonitoring extends Model
{

    protected $table = 'fuel_monitoring';

    use SoftDeletes;

    protected $fillable = [
                            'id',
                            'transaction_no',
                            'transaction_date',
                            'transaction_time',
                            'vendor',
                            'reference_no',
                            'location',
                            'project',
                            'equipment',
                            'operator',
                            'in',
                            'out',
                            'total_consumption_per_unit',
                            'no_of_hours',
                            'millage',
                            'created_user_id',
                            'updated_user_id',
                          ];

    public function created_by()
    {
        return $this->belongsTo('App\Models\User', 'created_user_id');
    }

    public function updated_by()
    {
        return $this->belongsTo('App\Models\User', 'updated_user_id');
    }

    public function location()
    {
        return $this->belongsTo('App\Models\Location', 'location');
    }

    public function equipment()
    {
        return $this->belongsTo('App\Models\Equipment', 'equipment');
    }

    public function operator()
    {
        return $this->belongsTo('App\Models\Operator', 'operator');
    }

    public function project()
    {
        return $this->belongsTo('App\Models\Project', 'project');
    }

}