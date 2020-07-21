<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Monitoring extends Model
{

    protected $table = 'monitoring';

    /**
     * Fuel stock/use
     */
    const FUEL_STOCK_CODE = 'FS';
    const FUEL_USE_CODE = 'FU';

    /**
     * Lubricant type of oil stock/use
     */
    const ENGINE_STOCK_CODE = 'LEOS';
    const ENGINE_USE_CODE = 'LEOU';
    const HYDRAULIC_STOCK_CODE = 'LHOS';
    const HYDRAULIC_USE_CODE = 'LHOU';
    const GEAR_STOCK_CODE = 'LGOS';
    const GEAR_USE_CODE = 'LGOU';
    const TELLUSE_STOCK_CODE = 'LTS';
    const TELLUSE_USE_CODE = 'LTU';


    const ENGINE_OIL_ID = 1;
    const HYDRAULIC_OIL_ID = 2;
    const GEAR_OIL_ID = 3;
    const TELLUSE_ID = 4;

    use SoftDeletes;

}