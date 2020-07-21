<?php

namespace App\Repositories\Lubricant;

use App\Models\LubricantMonitoring;
use App\Models\LubricantMonitoringLog;
use App\Models\Monitoring;
use App\Models\TypeOfOil;
use Core\Repository;
use Carbon\Carbon;
use Doctrine\DBAL\Query\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LubricantRepository implements Repository\Lubricant\LubricantRepository
{

    public function get_all_lubricants()
    {
        return LubricantMonitoring::with(['created_by','updated_by','equipment','location','operator','type_of_oil'])->toArray();
    }

    public function get_lubricant_by_id($lubricant_id)
    {
        return LubricantMonitoring::with(['created_by','updated_by','equipment','location','operator','type_of_oil'])->find($lubricant_id)->toArray();
    }

    public function get_type_of_oil_list_by_key_id()
    {
        return TypeOfOil::pluck('name','id');
    }

    public function get_lubricants(array $filters, $page, $per_page) : array
    {
        $model = new LubricantMonitoring;
        $lubricant = $model->with(['created_by','updated_by','equipment','location','operator','type_of_oil']);

        if (isset($filters['transaction']))
        {
            $lubricant->where(function($transaction) use ($filters) {
                $transaction->orWhere('transaction_no', 'like', '%'. $filters['transaction'] .'%');
            });
        }

        if (isset($filters['location']))
        {
            $lubricant->where('location', '=', $filters['location']);
        }

        if (isset($filters['equipment']))
        {
            $lubricant->where('equipment', '=', $filters['equipment']);
        }

        if (isset($filters['operator']))
        {
            $lubricant->where('operator', '=', $filters['operator']);
        }

        if (isset($filters['oil']))
        {
            $lubricant->where('type_of_oil_id', '=', $filters['oil']);
        }

        if (isset($filters['inout']))
        {
            $lubricant->whereNotNull($filters['inout']);
        }

        if (isset($filters['date_from']) && isset($filters['date_to']))
        {
            $dates = [new Carbon($filters['date_from']), new Carbon($filters['date_to'])];
            $lubricant->whereBetween('transaction_date', $dates);
        }


        $lubricant->orderBy('id', 'desc');

        $lubricant = $lubricant->paginate($per_page);

        return $lubricant->toArray();
    }

    public function get_pe_lubricants(array $filters) : array
    {
        $model = new LubricantMonitoring;
        $lubricant = $model->with(['created_by','updated_by','equipment','location','operator','type_of_oil']);

        if (isset($filters['date_from']) && isset($filters['date_to']))
        {
            $dates = [new Carbon($filters['date_from']), new Carbon($filters['date_to'])];
            $lubricant->whereBetween('transaction_date', $dates);
        }

        $lubricant->orderBy('id', 'desc');

        $lubricant = $lubricant->get();

        return $lubricant->toArray();
    }


    public function store_lubricant(array $lubricant) : array
    {
        DB::beginTransaction();

        $monitoring = new Monitoring;
        $logs = new LubricantMonitoringLog;
        $oil = (new TypeOfOil)->where('id',$lubricant['type_of_oil_id'])->first();
        $code_type = $this->get_monitoring_code($oil->id);
        $model = new LubricantMonitoring;


        if(isset($lubricant['in']) && $lubricant['in']){
            /**
             * Get monitoring value to update
             */
            $current = $monitoring->lockForUpdate()->where('code', $code_type['stock_code'])->first();
            $new_val = bcadd($current->value, $lubricant['in'],3);
            $this->update_monitoring($new_val, $code_type['stock_code']);

            /**
             * Set values in monitoring logs
             */
            $logs->user_id = \Auth::user()->id;
            $logs->username = \Auth::user()->username;
            $logs->remarks = 'add '.$lubricant['in'].' on '.$oil->name.' stock lubricant';
            $logs->oil = $oil->id;
            $logs->type = 'stock';
            $logs->previous_value = $current->value;
            $logs->added_value = $lubricant['in'];
            $logs->updated_value = $new_val;

            /**
             * Set Balance every stock
             */
            $total_lubricant_use = $monitoring->lockForUpdate()->where('code', $code_type['use_code'])->first();
            $model->total_consumption_per_unit = bcadd($current->value, $lubricant['in'], 3);
            $model->balance = bcadd(bcsub($current->value, $total_lubricant_use->value, 3), $lubricant['in'], 3);
        }
        else{
            /**
             * Get monitoring value to update
             */
            $current = $monitoring->lockForUpdate()->where('code', $code_type['use_code'])->first();
            $new_val = bcadd($current->value, $lubricant['out'],3);
            $this->update_monitoring($new_val, $code_type['use_code']);

            /**
             * Set values in monitoring logs
             */
            $logs->user_id = \Auth::user()->id;
            $logs->username = \Auth::user()->username;
            $logs->remarks = 'add '.$lubricant['out'].' on '.$oil->name.' use lubricant';
            $logs->oil = $oil->id;
            $logs->type = 'use';
            $logs->previous_value = $current->value;
            $logs->added_value = $lubricant['out'];
            $logs->updated_value = $new_val;


            /**
             * Set Balance every use
             */
            $total_lubricant_stock = $monitoring->lockForUpdate()->where('code', $code_type['stock_code'])->first();
            $model->total_consumption_per_unit = bcadd($current->value, $lubricant['out'], 3);
            $model->balance = bcsub($total_lubricant_stock->value,$new_val, 3);
        }


        /**
         * Save monitoring logs
         */
        $logs->save();

        /**
         * Store/Save Lubricant
         */

        $model->transaction_no = $lubricant['transaction_no'];
        $model->transaction_date = new Carbon($lubricant['transaction_date']);
        $model->type_of_oil_id = $lubricant['type_of_oil_id'];
        $model->created_user_id = $lubricant['created_user_id'];
        $model->updated_user_id = $lubricant['updated_user_id'];

        $model->in = $lubricant['in'];
        $model->vendor = $lubricant['vendor'];
        $model->reference_no = $lubricant['reference_no'];

        $model->out = $lubricant['out'];
        $model->equipment = $lubricant['equipment'];
        $model->operator = $lubricant['operator'];
        $model->location = $lubricant['location'];
        $model->project = $lubricant['project'];
        $model->remarks = $lubricant['remarks'];

        $model->save();

        DB::commit();

        return $model->toArray();
    }

    public function update_lubricant($lubricant_id, Request $data) : array
    {
        DB::beginTransaction();

        $monitoring = new Monitoring;
        $logs = new LubricantMonitoringLog;
        $lubricant_monitoring = (new LubricantMonitoring)->lockForUpdate()->where('id', $lubricant_id)->first();
        $model = new LubricantMonitoring;
        $in_out = ($data['in']) ? 'in' : 'out';

        $oil = (new TypeOfOil)->where('id',$lubricant_monitoring->type_of_oil_id)->first();
        $current_oil = (new TypeOfOil)->where('id',$data['type_of_oil_id'])->first();
        $code_type = $this->get_monitoring_code($current_oil->id);
        $code_type_prev = $this->get_monitoring_code($oil->id);

        if(isset($data['in']) && $data['in']){
            // Get the current value of centralise monitoring value
            $current = $monitoring->where('code', $code_type['stock_code'])->first();
            $prev = $monitoring->where('code', $code_type_prev['stock_code'])->first();

            // get total consumption per unit
            $getStockData = $model->lockForUpdate()
                ->whereNotNull($in_out)
                ->where('type_of_oil_id',$current_oil->id)
                ->where('id', '>=', $lubricant_monitoring->id)
                ->get();

            //get All data
            $getAllData = $model->lockForUpdate()
                ->where('type_of_oil_id',$current_oil->id)
                ->where('id', '>=', $lubricant_monitoring->id)
                ->get();

            //get All data
            $getPrevData = $model->lockForUpdate()
                ->where('type_of_oil_id',$current_oil->id)
                ->where('id', '<', $lubricant_monitoring->id)
                ->get();

             // Condition if type of oil is same or not
            if($oil->id === $current_oil->id){
                $remarks = 'update stock '.$data['transaction_no'].' from '.$lubricant_monitoring->in.' to '.$data['in'];
                $new_val = bcadd(bcsub($current->value, $lubricant_monitoring->in, 3), $data['in'], 3);

                // update total consumption per unit
                $this->update_total_consumption_per_unit($getStockData, $data['in']);

                // update remaining balance
                $this->update_remaining_balance($getAllData, $getPrevData->last(), $data['in']);

            } else {
                $remarks = 'update stock '.$data['transaction_no'].' from '.$lubricant_monitoring->in.' to '.$data['in'].' and change oil name '.$oil->name.' to '.$current_oil->name;
                $new_val = bcadd($current->value, $data['in'],3);

                // deduct the old IN value to previous oil
                $deducted_val = bcsub($prev->value, $lubricant_monitoring->in, 3);
                $this->update_monitoring(($deducted_val > 0 ? $deducted_val : $deducted_val * -1), $code_type_prev['stock_code']);
            }

            /**
             * Get monitoring value to update
             */
            $this->update_monitoring($new_val, $code_type['stock_code']);

            /**
             * Set values in monitoring logs
             */
            $logs->user_id = \Auth::user()->id;
            $logs->username = \Auth::user()->username;
            $logs->remarks = $remarks;
            $logs->oil = $current_oil->id;
            $logs->type = 'stock';
            $logs->previous_value = $current->value;
            $logs->added_value = $data['in'];
            $logs->updated_value = $new_val;
        }
        else{
            /**
             * Get the current value of centralise monitoring
             */
            $current = $monitoring->where('code', $code_type['use_code'])->first();
            $prev = $monitoring->where('code', $code_type_prev['use_code'])->first();

            // get total consumption per unit
            $getStockData = $model->lockForUpdate()
                ->whereNotNull($in_out)
                ->where('type_of_oil_id',$current_oil->id)
                ->where('id', '>=', $lubricant_monitoring->id)
                ->get();

            // get All data
            $getAllData = $model->lockForUpdate()
                ->where('type_of_oil_id',$current_oil->id)
                ->where('id', '>=', $lubricant_monitoring->id)
                ->get();

            //get All data
            $getPrevData = $model->lockForUpdate()
                ->where('type_of_oil_id',$current_oil->id)
                ->where('id', '<', $lubricant_monitoring->id)
                ->get();

            //Condition if type of oil is same or not
            if($oil->id == $current_oil->id){
                $remarks = 'update stock '.$data['transaction_no'].' from '.$lubricant_monitoring->out.' to '.$data['out'];
                $new_val = bcadd(bcsub($current->value, $lubricant_monitoring->out, 3), $data['out'], 3);

                // update total consumptio per unit
                $this->update_total_consumption_per_unit($getStockData, $data['out']);

                // update remaining balance
                $this->update_remaining_balance($getAllData, $getPrevData->last(), $data['out']);

            } else {
                $remarks = 'change '.$oil->name.' to '.$current_oil->name.' and update use to '.$data['out'].' lubricant';
                $new_val = bcadd($current->value, $data['out'], 3);
                /**
                 * deduct the old OUT value to previous oil
                 */
                $deducted_val = bcsub($prev->value, $lubricant_monitoring->out, 3);
                $this->update_monitoring(($deducted_val > 0 ? $deducted_val : $deducted_val * -1), $code_type_prev['use_code']);
            }


            /**
             * Get monitoring value to update
             */
            $this->update_monitoring($new_val, $code_type['use_code']);

            /**
             * Set values in monitoring logs
             */
            $logs->user_id = \Auth::user()->id;
            $logs->username = \Auth::user()->username;
            $logs->remarks = $remarks;
            $logs->oil = $current_oil->id;
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
         * Edit/Update Lubricant
         */
        LubricantMonitoring::where('id', $lubricant_id)->update([

            'transaction_date' => new Carbon($data->transaction_date),
            'type_of_oil_id' => $data->type_of_oil_id,
            'updated_user_id' => \Auth::user()->id,

            'in' => $data->in,
            'vendor' => $data->vendor,
            'reference_no' => $data->reference_no,

            'out' => $data->out,
            'equipment' => $data->equipment,
            'operator' => $data->operator,
            'location' => $data->location,
            'project' => $data->project,
            'remarks' => $data->remarks,
        ]);

        DB::commit();

        return LubricantMonitoring::find($lubricant_id)->toArray();
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

            LubricantMonitoring::where('id', $item->id)->update([
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

            LubricantMonitoring::where('id', $item->id)->update([
                'total_consumption_per_unit' => floatval($tcpu)
            ]);
        }
    }

    /**
     * Check lubricant stock and use
     */
    public function stocked_lubricant($code)
    {
        return Monitoring::where('code',$code)->first();
    }

    public function used_lubricant($code)
    {
        return Monitoring::where('code',$code)->first();
    }

    public function available_lubricant($out, $update = true, $type_id)
    {
        $code_type = $this->get_monitoring_code($type_id);

        if(isset($out) && $out && $update)
            return bcadd(bcsub(($this->stocked_lubricant($code_type['stock_code']))->value, ($this->used_lubricant
            ($code_type['use_code']))->value, 3), $out, 3);

        return bcsub(($this->stocked_lubricant($code_type['stock_code']))->value, ($this->used_lubricant($code_type['use_code']))->value, 3);
    }

    public function updated_stocked_lubricant($in, $current_in, $code)
    {
        return bcadd(bcsub(($this->stocked_lubricant($code))->value, $in), $current_in, 3);
    }

    /**
     * @important
     * Update monitoring table fuel stock and use
     */
    public function update_monitoring($value, $code)
    {
        (new Monitoring)->where('code', $code)->update(['value' => $value]);

    }

    /**
     * get Code through type of oil ID
     */
    public function get_monitoring_code($type)
    {
        switch ($type){
            case '1':
                $stock_code = Monitoring::ENGINE_STOCK_CODE;
                $use_code = Monitoring::ENGINE_USE_CODE;
                break;

            case '2':
                $stock_code = Monitoring::HYDRAULIC_STOCK_CODE;
                $use_code = Monitoring::HYDRAULIC_USE_CODE;
                break;

            case '3':
                $stock_code = Monitoring::GEAR_STOCK_CODE;
                $use_code = Monitoring::GEAR_USE_CODE;
                break;

            case '4':
                $stock_code = Monitoring::TELLUSE_STOCK_CODE;
                $use_code = Monitoring::TELLUSE_USE_CODE;
                break;
        }

        return ['stock_code' => $stock_code, 'use_code' => $use_code];
    }
}
