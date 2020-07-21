<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LubricantMonitoring extends Model
{

    protected $table = 'lubricant_monitoring';

    use SoftDeletes;

    protected $fillable = [
                            'id',
                            'transaction_no',
                            'transaction_date',
                            'vendor',
                            'reference_no',
                            'location',
                            'equipment',
                            'type_of_oil_id',
                            'in',
                            'out',
                            'total_consumption_per_unit',
                            'total_daily_consumption',
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

    public function type_of_oil()
    {
        return $this->belongsTo('App\Models\TypeOfOil', 'type_of_oil_id');
    }

    public function operator()
    {
        return $this->belongsTo('App\Models\Operator', 'operator');
    }
}