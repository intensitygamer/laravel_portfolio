<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FuelProjects extends Model
{
    use SoftDeletes;

    protected $table = 'fuel_projects';

    protected $fillable = [ 'id', 
    						'projects_id', 
    						'balance', 
    						'total_fuel_consumed', 
    						'total_fuel_stocked', 
    						'updated_at',
    						'created_at' 

    						];

    public function created_by()
    {
        return $this->belongsTo('App\Models\User', 'created_user_id');
    }

}