<?php

namespace App\Helpers;

use App\Models\TypeOfOil;
use App\Models\Monitoring;
use App\Models\FuelMonitoring;


class MonitorHelper
{
    /**
     * @return Fuel stock and use
     */

    public $total_fuel_previous_balance,$previous_fuel_trans, $total_fuel_in, $total_fuel_out;


    public function get_total_fuel_stock()
    {
        return ((new Monitoring)->where('code',Monitoring::FUEL_STOCK_CODE)->first())->value;
    }

    public function get_total_fuel_use()
    {
        return ((new Monitoring)->where('code',Monitoring::FUEL_USE_CODE)->first())->value;
    }

    /**
     * @return Lubricant stock and use
     */
    public function get_total_engine_stock()
    {
        return ((new Monitoring)->where('code',Monitoring::ENGINE_STOCK_CODE)->first())->value;
    }

    public function get_total_engine_use()
    {
        return ((new Monitoring)->where('code',Monitoring::ENGINE_USE_CODE)->first())->value;
    }

    public function get_total_hydraulic_stock()
    {
        return ((new Monitoring)->where('code',Monitoring::HYDRAULIC_STOCK_CODE)->first())->value;
    }

    public function get_total_hydraulic_use()
    {
        return ((new Monitoring)->where('code',Monitoring::HYDRAULIC_USE_CODE)->first())->value;
    }

    public function get_total_gear_stock()
    {
        return ((new Monitoring)->where('code',Monitoring::GEAR_STOCK_CODE)->first())->value;
    }

    public function get_total_gear_use()
    {
        return ((new Monitoring)->where('code',Monitoring::GEAR_USE_CODE)->first())->value;
    }

    public function get_total_telluse_stock()
    {
        return ((new Monitoring)->where('code',Monitoring::TELLUSE_STOCK_CODE)->first())->value;
    }

    public function get_total_telluse_use()
    {
        return ((new Monitoring)->where('code',Monitoring::TELLUSE_USE_CODE)->first())->value;
    }    

    public function get_all_previous_fuel_trans($date, $project)
    {   
        //* Query All Fuel Transactions where date is before date start ...

        $date_before = strtotime("-1 day", strtotime($date));
        
        $this->previous_fuel_trans = ((new FuelMonitoring)->whereDate('transaction_date', "<", $date_before)->where('project', '=', $project)->get()->toArray());


        $total_fuel_in  = 0;
        $total_fuel_out = 0;

        if(count($this->previous_fuel_trans) >= 1 ) {

        foreach($this->previous_fuel_trans as $row_fuel){

            $total_fuel_in  += $row_fuel['in'];
            $total_fuel_out += $row_fuel['out'];
    
        }
        
        $this->total_fuel_previous_balance = $total_fuel_in - $total_fuel_out;

        $this->total_fuel_in  = $total_fuel_in;
        $this->total_fuel_out = $total_fuel_out;

        
        return $this->previous_fuel_trans;
        
        }

    }

    public function get_previousMonth_fuel_balanceInfo($date_from, $date_to, $project)
    {   
        //* Query All Fuel Transactions where date is before date start ...

        $date_from = date("Y-m-d", strtotime("-1 day", strtotime($date_from)));

        $date_to = date("Y-m-d", strtotime("-1 day", strtotime($date_to)));

        $dates = [$date_from, $date_to];
        
        return ((new FuelMonitoring)->whereBetween('transaction_date', $dates)->where('project', '=', $project)->get()->toArray());
        
    }

    public function get_total_fuel_previous_balance()
    {

        $total_fuel_in  = 0;
        $total_fuel_out = 0;

        if(count($this->previous_fuel_trans) >= 1 ) {
         
            foreach($this->previous_fuel_trans->items as $row_fuel){

            $total_fuel_in  += $row_fuel['in'];
            $total_fuel_out += $row_fuel['out'];
    
            }

        }

        $this->total_fuel_previous_balance = $total_fuel_in - $total_fuel_out;

        return $this->total_fuel_previous_balance;

    }


}