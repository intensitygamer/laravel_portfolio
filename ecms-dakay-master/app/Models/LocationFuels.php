<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LocationFuels extends Model
{
    protected $table = 'fuel_location';

    protected $fillable = [ 'id', 
    'location_id',
     'balance', 
     'total_fuel_consumed', 
     'total_fuel_stocked', 
     'updated_at', 
     'created_at' ];
}


