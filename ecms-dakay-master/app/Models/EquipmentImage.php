<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EquipmentImage extends Model
{
    protected $table = 'equipment_images';

    use SoftDeletes;

    protected $fillable = [ 'id', 'equipment_id', 'file_name', 'file_url', 'file_description', 'file_extension' ];

}