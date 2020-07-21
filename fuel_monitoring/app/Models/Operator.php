<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Operator extends Model
{
    use SoftDeletes;

    protected $fillable = [ 'id', 'name', 'alias', 'license_no', 'driver_code', 'operator_date', 'address', 'phone_no', 'created_user_id' ];

    public function created_by()
    {
        return $this->belongsTo('App\Models\User', 'created_user_id');
    }

}