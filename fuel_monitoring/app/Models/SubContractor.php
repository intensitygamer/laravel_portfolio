<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubContractor extends Model
{
    protected $table = 'subcontractors';

    use SoftDeletes;

    protected $fillable = [ 'id', 'name', 'address', 'contact_1', 'contact_2', 'website', 'created_user_id' ];

    public function created_by()
    {
        return $this->belongsTo('App\Models\User', 'created_user_id');
    }

}