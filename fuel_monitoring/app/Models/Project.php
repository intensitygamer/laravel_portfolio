<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{

    protected $table = 'projects';

    use SoftDeletes;

    protected $fillable = [
                            'id',
                            'name',
                            'location'
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

    // public function equipment()
    // {
    //     return $this->belongsTo('App\Models\Equipment', 'equipment');
    // }

    // public function operator()
    // {
    //     return $this->belongsTo('App\Models\Operator', 'operator');
    // }

}