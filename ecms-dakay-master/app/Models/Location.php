<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends Model
{
    use SoftDeletes;

    protected $fillable = [ 'id', 'name', 'address', 'location_date', 'contact_person', 'phone_no', 'created_user_id' ];

    public function created_by()
    {
        return $this->belongsTo('App\Models\User', 'created_user_id');
    }

}