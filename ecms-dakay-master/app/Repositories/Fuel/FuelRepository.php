<?php

namespace App\Repositories\Fuel;

use App\Models\FuelMonitoring;
use App\Models\FuelMonitoringLog;
use App\Models\LubricantMonitoring;
use App\Models\Monitoring;
use App\Models\FuelProjects;
use Core\Repository;
use Carbon\Carbon;
use Doctrine\DBAL\Query\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Debug\Dumper;

class FuelRepository implements Repository\Fuel\FuelRepository
{

    public function get_all_fuels()
    {
        return FuelMonitoring::with(['created_by','updated_by','equipment','location','operator', 'project'])->toArray()->orderBy('id', 'asc');
    }

    public function get_fuel_by_id($fuel_id)
    {
        return FuelMonitoring::with(['created_by','updated_by','equipment','location','operator', 'project'])->find($fuel_id)->toArray();
    }

    public function get_fuels(array $filters, $page, $per_page) : array
    {
        $model = new FuelMonitoring;

        $fuel = $model->with(['created_by','updated_by','equipment','location','operator', 'project']);

        if (isset($filters['transaction']))
        {
            $fuel->where(function($transaction) use ($filters) {
                $transaction->orWhere('transaction_no', 'like', '%'. $filters['transaction'] .'%');
            });
        }


        if (isset($filters['location']))
        {
            $fuel->where('location', '=', $filters['location']);
        }

        if (isset($filters['project']))
        {
            $fuel->where('project', '=', $filters['project']);
        }

        if (isset($filters['equipment']))
        {
            $fuel->where('equipment', '=', $filters['equipment']);
        }

        if (isset($filters['operator']))
        {
            $fuel->where('operator', '=', $filters['operator']);
        }

        if (isset($filters['inout']))
        {
            $fuel->whereNotNull($filters['inout']);
        }

        if (isset($filters['date_from']) && isset($filters['date_to']))
        {
            $dates = [new Carbon($filters['date_from']), new Carbon($filters['date_to'])];
            $fuel->whereBetween('transaction_date', $dates);
        }


        $fuel->orderBy('id', 'asc');

        $fuel = $fuel->paginate($per_page);

        return $fuel->toArray();
    }

    public function get_pe_fuels(array $filters) : array
    {
        $model = new FuelMonitoring;
        $fuel = $model->with(['created_by','updated_by','equipment','location','operator', 'project']);

        if (isset($filters['date_from']) && isset($filters['date_to']))
        {
            $dates = [new Carbon($filters['date_from']), new Carbon($filters['date_to'])];
            $fuel->whereBetween('transaction_date', $dates);
        }

        if (isset($filters['project']))

        {
            $fuel->where('project', '=', $filters['project']);
 
        }

        $fuel->orderBy('id', 'asc');

        $fuel = $fuel->get();

        return $fuel->toArray();
    }

    public function store_fuel(array $fuel) : array
    {
        DB::beginTransaction();

        $monitoring     = new Monitoring;
        
        // $fuel_projects  = new FuelProjects;
        
        $model          = new FuelMonitoring;
        

        // $fuel_projects  = FuelProjects::where(['projects_id' => $fuel['project']])->first();
        
        // $fuel_projects_info = $fuel_projects->lockForUpdate()->where('location_id', $fuel['location'])->first();

        if((isset($fuel['in']) && $fuel['in']) || (isset($fuel['out']) && $fuel['out'])){
           

            /**
             * Store/Save Fuel
             */

            $model->transaction_no = $fuel['transaction_no'];
            $model->transaction_date = new Carbon($fuel['transaction_date']);
            $model->created_user_id = $fuel['created_user_id'];
            $model->updated_user_id = $fuel['updated_user_id'];

            $model->in = $fuel['in'];
            $model->millage = $fuel['millage'];
            $model->no_of_hours = $fuel['no_of_hours'];
            $model->vendor = $fuel['vendor'];
            $model->reference_no = $fuel['reference_no'];

            $model->out = $fuel['out'];
            $model->equipment = $fuel['equipment'];
            $model->operator = $fuel['operator'];
            $model->project = $fuel['project'];
            $model->remarks = $fuel['remarks'];
            
            $model->transaction_time = ($fuel['transaction_time'] ? new Carbon($fuel['transaction_time']) : NULL);

            $model->save();


        }

        DB::commit();

        return $model->find($model->id)->toArray();
    }


    public function delete_fuel($fuel_id){
                
        $fuel = FuelMonitoring::find($fuel_id);

        $fuel->delete();
    }
 

    public function update_fuel($fuel_id, Request $data) : array
    {
        DB::beginTransaction();
        $monitoring = new Monitoring;
        $logs = new FuelMonitoringLog;
        $model = new FuelMonitoring;
        $in_out = ($data['in']) ? 'in' : 'out';

        $fuel_monitoring = $model::where('id', $fuel_id)->first();

        $getStockData = $model->lockForUpdate()
            ->whereNotNull($in_out)
            ->where('id', '>=', $fuel_monitoring->id)
            ->get();

        $getAllData = $model->lockForUpdate()
            ->where('id', '>=', $fuel_monitoring->id)
            ->get();

        $getPrevlData = $model->lockForUpdate()
            ->where('id', '<', $fuel_monitoring->id)
            ->get();

        if(isset($data['in']) && $data['in']){

            // total consumption update
            $this->update_total_consumption_per_unit($getStockData, $data['in']);

            // remaining balance
            $this->update_remaining_balance($getAllData, $getPrevlData->last(), $data['in']);

            // update monitoring
            $current = $monitoring->lockForUpdate()->where('code', Monitoring::FUEL_STOCK_CODE)->first();
            $new_val = bcadd(bcsub($current->value, $fuel_monitoring->in), $data['in'], 3);
            $this->update_monitoring($new_val, Monitoring::FUEL_STOCK_CODE);

            /**
             * Set values in monitoring logs
             */
            $logs->user_id = \Auth::user()->id;
            $logs->username = \Auth::user()->username;
            $logs->remarks = 'update stock fuel on #'.$fuel_monitoring->transaction_no.' from '.$fuel_monitoring->in.' to ' .$data['in'];
            $logs->type = 'stock';
            $logs->previous_value = $current->value;
            $logs->added_value = $data['in'];
            $logs->updated_value = $new_val;

        } else {
            // total consumption update
            $this->update_total_consumption_per_unit($getStockData, $data['out']);

            // remaining balance
            $this->update_remaining_balance($getAllData, $getPrevlData->last(), $data['out']);

            // update monitoring
            $current = $monitoring->lockForUpdate()->where('code', Monitoring::FUEL_USE_CODE)->first();
            $new_val = bcadd(bcsub($current->value, $fuel_monitoring->out, 3), $data['out'], 3);
            $this->update_monitoring($new_val, Monitoring::FUEL_USE_CODE);

            /**
             * Set values in monitoring logs
             */
            $logs->user_id = \Auth::user()->id;
            $logs->username = \Auth::user()->username;
            $logs->remarks = 'update stock fuel on #'.$fuel_monitoring->transaction_no.' from '.$fuel_monitoring->out.' to ' .$data['out'];
            $logs->type = 'use';
            $logs->previous_value = $current->value;
            $logs->added_value = $data['out'];
            $logs->updated_value = $new_val;
        }

        /**
         * Save monitoring logs
         */
        $logs->save();

        /**
         * Edit/Update Fuel
         */
        FuelMonitoring::where('id', $fuel_id)->update([

            'transaction_date' => new Carbon($data->transaction_date),
            'updated_user_id' => \Auth::user()->id,

            'in' => $data->in,
            'no_of_hours' => $data->no_of_hours,
            'millage' => $data->millage,
            'vendor' => $data->vendor,
            'reference_no' => $data->reference_no,

            'out' => $data->out,
            'equipment' => $data->equipment,
            'location' => $data->location,
            'operator' => $data->operator,
            'project' => $data->project,
            'remarks' => $data->remarks,
            'transaction_time' => ($data->transaction_time ? new Carbon($data->transaction_time) : NULL),
        ]);

        DB::commit();

        return FuelMonitoring::find($fuel_id)->toArray();
    }

    public function update_remaining_balance($data, $prevData, $new_val)
    {
        $rb = 0;
        $prevBalance = ($prevData && !empty($prevData->balance) ? floatval($prevData->balance) : 0);

        // update data
        foreach($data as $key => $item) {
            if($key === 0){
                if($item->in) {
                    $rb = bcadd($prevBalance, $new_val,3);
                } else {
                    $rb = bcsub($prevBalance, $new_val, 3);
                }
            } else {
                if(!empty($item->in)) {
                    $rb += $item->in;
                } else {
                    $rb -= $item->out;
                }
            }

            FuelMonitoring::where('id', $item->id)->update([
                'balance' => floatval($rb)
            ]);
        }
    }

    public function update_total_consumption_per_unit($data, $new_val)
    {
        $tcpu = 0;

        //update data
        foreach($data as $key => $item) {
            $val = ($item->in) ? $item->in : $item->out;
            $tcpu += $val;

            if($key === 0){
                $prev_tcpu = bcsub($item->total_consumption_per_unit, $val, 3);
                $tcpu = bcadd($new_val, $prev_tcpu, 3);
            }

            FuelMonitoring::where('id', $item->id)->update([
                'total_consumption_per_unit' => floatval($tcpu)
            ]);
        }
    }

    /**
     * Check fuel stock and use
     */
    public function stocked_fuel()
    {
        return Monitoring::where('code',Monitoring::FUEL_STOCK_CODE)->first();
    }

    public function used_fuel()
    {
        return Monitoring::where('code',Monitoring::FUEL_USE_CODE)->first();
    }

    public function available_fuel($out, $update = true)
    {

        if(isset($out) && $out && $update)
            return bcadd(bcsub(($this->stocked_fuel())->value, ($this->used_fuel())->value, 3), $out, 3);

        return bcsub(($this->stocked_fuel())->value, ($this->used_fuel())->value, 3);
    }

    public function updated_stocked_fuel($in, $current_in)
    {
        return bcadd(bcsub(($this->stocked_fuel())->value, $in, 3), $current_in,3);
    }

    /**
     * @important
     * Update monitoring table fuel stock and use
     */
    public function update_monitoring($value, $type)
    {
        (new Monitoring)->where('code', $type)->update(['value' => $value]);
    }

    /**
     * @charts
     * Queries fuel table for charts
     * @fuel
     */
    public function fuel_chart_monthly_usage($filters)
    {
        $fuel = new FuelMonitoring;

        if(isset($filters) && $filters){
            /**
             * Wtih filters
             */
            $end = (new Carbon())->parse($filters['date_to'])->addMonth()->toDateTimeString();
            $start = (new Carbon())->parse($filters['date_from'])->toDateTimeString();
            $dates = \App\Helpers\DateHelper::get_between_dates($start, $end);
            $months = [];

            foreach ($dates as $date){
                $months[] = $date['month'];
            }

            $months_in = implode(",",$months);
        } else {
            /**
             * Without filters
             */
            $today = new Carbon();
            $end = $today->addMonth()->toDateTimeString();
            $start = $today->subMonth(3)->toDateTimeString();
            $dates = \App\Helpers\DateHelper::get_between_dates($start, $end);
            $months = [];

            foreach ($dates as $date){
                $months[] = $date['month'];
            }

            $months_in = implode(",",$months);
        }

        $fuels =  $fuel
                ->selectRaw("CONCAT(year(`transaction_date`), '-', month(`transaction_date`)) as monthYear, month(`transaction_date`) as month, sum(IFNULL(`out`,0)) as total_consume")
                ->whereRaw( "month(`transaction_date`) in (". $months_in .")")
                ->groupBy("monthYear")
                ->groupBy("month")
                ->get()->toArray();

        $latest_data = [];

        foreach ($dates as $date){
            $latest_data[$date['year-month']] = [
                'year' => $date['year'],
                'month' => \App\Helpers\DateHelper::monthsText()[$date['month']],
                'total_consume' => 0,
            ];
            foreach ($fuels as $fuel){
                if($fuel['monthYear'] == $date['year-month']){
                    $latest_data[$date['year-month']] = [
                        'year' => $date['year'],
                        'month' => \App\Helpers\DateHelper::monthsText()[$date['month']],
                        'total_consume' => $fuel['total_consume'],
                    ];
                }
            }
        }

        $data = ['labels'=>[], 'datasets'=>[]];

        foreach (array_unique($latest_data, SORT_REGULAR) as $key => $item) {
            array_push($data['labels'], $item['year'].'-'.$item['month'] );
            array_push($data['datasets'], $item['total_consume'] );
        }

        return $data;

    }

    /**
     * @charts
     * Queries fuel table for charts
     * @fuel
     */
    public function fuel_chart_monthly_stock($filters)
    {
        $fuel = new FuelMonitoring;

        if(isset($filters) && $filters){
            /**
             * Wtih filters
             */
            $end = (new Carbon())->parse($filters['date_to'])->addMonth()->toDateTimeString();
            $start = (new Carbon())->parse($filters['date_from'])->toDateTimeString();
            $dates = \App\Helpers\DateHelper::get_between_dates($start, $end);
            $months = [];

            foreach ($dates as $date){
                $months[] = $date['month'];
            }

            $months_in = implode(",",$months);
        } else {
            /**
             * Without filters
             */
            $today = new Carbon();
            $end = $today->addMonth()->toDateTimeString();
            $start = $today->subMonth(3)->toDateTimeString();
            $dates = \App\Helpers\DateHelper::get_between_dates($start, $end);
            $months = [];

            foreach ($dates as $date){
                $months[] = $date['month'];
            }

            $months_in = implode(",",$months);
        }

        $fuels =  $fuel
            ->selectRaw("CONCAT(year(`transaction_date`), '-', month(`transaction_date`)) as monthYear, month(`transaction_date`) as month, sum(IFNULL(`in`,0)) as total_stock")
            ->whereRaw( "month(`transaction_date`) in (". $months_in .")")
            ->groupBy("monthYear")
            ->groupBy("month")
            ->get()->toArray();

        $latest_data = [];

        foreach ($dates as $date){
            $latest_data[$date['year-month']] = [
                'year' => $date['year'],
                'month' => \App\Helpers\DateHelper::monthsText()[$date['month']],
                'total_stock' => 0,
            ];
            foreach ($fuels as $fuel){
                if($fuel['monthYear'] == $date['year-month']){
                    $latest_data[$date['year-month']] = [
                        'year' => $date['year'],
                        'month' => \App\Helpers\DateHelper::monthsText()[$date['month']],
                        'total_stock' => $fuel['total_stock'],
                    ];
                }
            }
        }

        $data = ['labels'=>[], 'datasets'=>[]];

        foreach (array_unique($latest_data, SORT_REGULAR) as $key => $item) {
            array_push($data['labels'], $item['year'].'-'.$item['month'] );
            array_push($data['datasets'], $item['total_stock'] );
        }

        return $data;

    }

    /**
     * @charts
     * Queries fuel table for charts
     * @lubricant
     */
    public function lubricant_chart_monthly_usage($filters, $code, $id)
    {
        $lubricant = new LubricantMonitoring;

        if(isset($filters) && $filters){
            /**
             * Wtih filters
             */
            $end = (new Carbon())->parse($filters['date_to'])->addMonth()->toDateTimeString();
            $start = (new Carbon())->parse($filters['date_from'])->toDateTimeString();
            $dates = \App\Helpers\DateHelper::get_between_dates($start, $end);
            $months = [];

            foreach ($dates as $date){
                $months[] = $date['month'];
            }

            $months_in = implode(",",$months);
        } else {
            /**
             * Without filters
             */
            $today = new Carbon();
            $end = $today->addMonth()->toDateTimeString();
            $start = $today->subMonth(3)->toDateTimeString();
            $dates = \App\Helpers\DateHelper::get_between_dates($start, $end);
            $months = [];

            foreach ($dates as $date){
                $months[] = $date['month'];
            }

            $months_in = implode(",",$months);
        }

        $lubricants =  $lubricant
            ->selectRaw("CONCAT(year(`transaction_date`), '-', month(`transaction_date`)) as monthYear, month(`transaction_date`) as month, sum(IFNULL(`out`,0)) as total_consume")
            ->where('type_of_oil_id', $id)
            ->whereRaw( "month(`transaction_date`) in (". $months_in .")")
            ->groupBy("monthYear")
            ->groupBy("month")
            ->get()->toArray();

        $latest_data = [];

        foreach ($dates as $date){
            $latest_data[$date['year-month']] = [
                'year' => $date['year'],
                'month' => \App\Helpers\DateHelper::monthsText()[$date['month']],
                'total_consume' => 0,
            ];
            foreach ($lubricants as $lubricant){
                if($lubricant['monthYear'] == $date['year-month']){
                    $latest_data[$date['year-month']] = [
                        'year' => $date['year'],
                        'month' => \App\Helpers\DateHelper::monthsText()[$date['month']],
                        'total_consume' => $lubricant['total_consume'],
                    ];
                }
            }
        }

        $data = ['labels'=>[], 'datasets'=>[]];

        foreach (array_unique($latest_data, SORT_REGULAR) as $key => $item) {
            array_push($data['labels'], $item['year'].'-'.$item['month'] );
            array_push($data['datasets'], $item['total_consume'] );
        }

        return $data;

    }

    /**
     * @charts
     * Queries fuel table for charts
     * @lubricant
     */
    public function lubricant_chart_monthly_stock($filters, $code, $id)
    {
        $lubricant = new LubricantMonitoring;

        if(isset($filters) && $filters){
            /**
             * Wtih filters
             */
            $end = (new Carbon())->parse($filters['date_to'])->addMonth()->toDateTimeString();
            $start = (new Carbon())->parse($filters['date_from'])->toDateTimeString();
            $dates = \App\Helpers\DateHelper::get_between_dates($start, $end);
            $months = [];

            foreach ($dates as $date){
                $months[] = $date['month'];
            }

            $months_in = implode(",",$months);
        } else {
            /**
             * Without filters
             */
            $today = new Carbon();
            $end = $today->addMonth()->toDateTimeString();
            $start = $today->subMonth(3)->toDateTimeString();
            $dates = \App\Helpers\DateHelper::get_between_dates($start, $end);
            $months = [];

            foreach ($dates as $date){
                $months[] = $date['month'];
            }

            $months_in = implode(",",$months);
        }

        $lubricants =  $lubricant
            ->selectRaw("CONCAT(year(`transaction_date`), '-', month(`transaction_date`)) as monthYear, month(`transaction_date`) as month, sum(IFNULL(`in`,0)) as total_stock")
            ->where('type_of_oil_id', $id)
            ->whereRaw( "month(`transaction_date`) in (". $months_in .")")
            ->groupBy("monthYear")
            ->groupBy("month")
            ->get()->toArray();

        $latest_data = [];

        foreach ($dates as $date){
            $latest_data[$date['year-month']] = [
                'year' => $date['year'],
                'month' => \App\Helpers\DateHelper::monthsText()[$date['month']],
                'total_stock' => 0,
            ];
            foreach ($lubricants as $lubricant){
                if($lubricant['monthYear'] == $date['year-month']){
                    $latest_data[$date['year-month']] = [
                        'year' => $date['year'],
                        'month' => \App\Helpers\DateHelper::monthsText()[$date['month']],
                        'total_stock' => $lubricant['total_stock'],
                    ];
                }
            }
        }

        $data = ['labels'=>[], 'datasets'=>[]];

        foreach (array_unique($latest_data, SORT_REGULAR) as $key => $item) {
            array_push($data['labels'], $item['year'].'-'.$item['month'] );
            array_push($data['datasets'], $item['total_stock'] );
        }

        return $data;

    }
}
