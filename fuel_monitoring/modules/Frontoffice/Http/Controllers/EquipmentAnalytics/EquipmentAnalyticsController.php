<?php

namespace Modules\FrontOffice\Http\Controllers\EquipmentAnalytics;

use App\Http\Controllers\Controller;

class EquipmentAnalyticsController extends Controller
{

    function index(){
        return view('modules.frontoffice.manage.equipment_analytics.index');
    }

}