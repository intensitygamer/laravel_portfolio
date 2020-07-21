<?php

namespace App\Repositories\SubContractorWork;

use App\Models\SubContractorWork;
use App\Models\SubContractorWorkPayments;
use App\Models\LubricantMonitoring;
use App\Models\Monitoring;
use Core\Repository;
use Carbon\Carbon;
use Doctrine\DBAL\Query\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SubContractorWorkRepository implements Repository\SubContractorWork\SubContractorWorkRepository
{

    public function get_all_subcontractor_works()
    {
        return SubContractorWork::with(['created_by','updated_by','equipment','subcontractorwork_payments'])->toArray();
    }

    public function get_subcontractor_work_by_id($subcontractor_work_id)
    {
        return SubContractorWork::with(['created_by','updated_by','equipment','subcontractor','subcontractorwork_payments'])->find($subcontractor_work_id)->toArray();
    }

    public function get_subcontractor_works(array $filters, $page, $per_page) : array
    {
        $model = new SubContractorWork;
        $subcontractor_work = $model->with(['created_by','updated_by','equipment','subcontractor']);

        if (isset($filters['q']))
        {
            $subcontractor_work->where(function($q) use ($filters) {
                $q->orWhere('transaction_no', 'like', '%'. $filters['q'] .'%');
                $q->orWhere('project', 'like', '%'. $filters['q'] .'%');
            });
        }

        if (isset($filters['subcontractor']))
        {
            $subcontractor_work->where('subcontractor', '=', $filters['subcontractor']);
        }

        if (isset($filters['equipment']))
        {
            $subcontractor_work->where('equipment', '=', $filters['equipment']);
        }

        if (isset($filters['date_from']) && isset($filters['date_to']))
        {
            $dates = [new Carbon($filters['date_from']), new Carbon($filters['date_to'])];

             $subcontractor_work->whereBetween('transaction_date', $dates);

            //$subcontractor_work->whereBetween('payment_updated_at', $dates);

        }


        $subcontractor_work->orderBy('id', 'desc');

        $subcontractor_work = $subcontractor_work->paginate($per_page);

        return $subcontractor_work->toArray();
    }

    public function get_pe_subcontractor_works(array $filters) : array
    {
        $model = new SubContractorWork;
        $subcontractor_work = $model->with(['created_by','updated_by','equipment','subcontractor','subcontractorwork_payments']);

        if (isset($filters['subcontractor']))
        {
            $subcontractor_work->where('subcontractor', '=', $filters['subcontractor']);
        }

        if (isset($filters['date_from']) && isset($filters['date_to']))
        {
            $dates = [new Carbon($filters['date_from']), new Carbon($filters['date_to'])];

            $subcontractor_work->whereBetween('payment_update_at', $dates);

            // $subcontractor_work->whereBetween('transaction_date', $dates);
        }

        $subcontractor_work->orderBy('id', 'asc');

        $subcontractor_work = $subcontractor_work->get();

        return $subcontractor_work->toArray();
    }

    public function get_subcontractor_works_by_search_id(array $filters, $page, $per_page) : array
    {

        if (isset($filters['subcontractor']))
        {
            $model = new SubContractorWork;

            $subcontractor_work = $model->with(['created_by','updated_by','equipment','subcontractor']);

            $subcontractor_work->where('subcontractor', '=', $filters['subcontractor']);

            if (isset($filters['date_from']) && isset($filters['date_to']))
            {
                    
                //* Need to add 1 day on the filtered dates to resolve MySql bug the delay date selected filter

                $date_from = new Carbon($filters['date_from']);
                // $date_from->addDays("1");

                $date_to =  new Carbon($filters['date_to']) ;
                // $date_to->addDays("1");

     
                $dates = [$date_from, $date_to];
                $subcontractor_work->whereBetween('payment_update_at', $dates);
            }

            $subcontractor_work->orderBy('id', 'asc');

            $subcontractor_work = $subcontractor_work->paginate($per_page);

            $subcontractor_work = $subcontractor_work->toArray();
        }

        else {
            $subcontractor_work = [];
        }

        return $subcontractor_work;
    }

    public function store_subcontractor_work(array $subcontractor_work) : array
    {

        DB::beginTransaction();

        /**
         * Store/Save SubContractorWork
         */
        $model = new SubContractorWork;

        $model->transaction_no = $subcontractor_work['transaction_no'];
        $model->transaction_date = new Carbon($subcontractor_work['transaction_date']);
        $model->created_user_id = $subcontractor_work['created_user_id'];
        $model->updated_user_id = $subcontractor_work['updated_user_id'];

        $model->subcontractor = $subcontractor_work['subcontractor'];
        $model->equipment = $subcontractor_work['equipment'];
        $model->project = $subcontractor_work['project'];
        $model->scope_of_work = $subcontractor_work['scope_of_work'];
        $model->project_start_date = new Carbon($subcontractor_work['transaction_date']);

        $model->contract_amount = $subcontractor_work['contract_amount'];


        $model->total_amount_due_left = $subcontractor_work['contract_amount'];
 
        /**
            * Store Additional Details in Sub Con Table if Amount To Pay is Applicable

        */

        if($subcontractor_work['total_current_paid_amount']){

            
            $FirstDay = date("Y-m-d", strtotime("sunday last week"));

            $LastDay  = date("Y-m-d", strtotime("sunday this week"));

            $project_start_date  = date("Y-m-d", strtotime($subcontractor_work['transaction_date']));
           
            // * Check if project start date is within this week

            if($project_start_date > $FirstDay && $project_start_date < $LastDay){

                $model->total_current_paid_amount = $subcontractor_work['total_current_paid_amount'];

             }else {
 
                 $model->total_previous_paid_amount = $subcontractor_work['total_current_paid_amount'];

             }

             $model->last_payment_amount = $subcontractor_work['total_current_paid_amount'];
 
            $model->payment_update_at = date("Y-m-d H:i:s");
                
            //$model->payment_update_at = new Carbon($subcontractor_work['transaction_date']);

            $model->total_amount_due_left = $subcontractor_work['contract_amount'] - $subcontractor_work['total_current_paid_amount'];

        }

       $current_work = $model->save();

        /**
            * Store Payment Details for Sub Con Work Payment Table

        */


       if($subcontractor_work['total_current_paid_amount']){

            $amount_to_pay = $subcontractor_work['total_current_paid_amount'];


            $current_total_previous_paid_amount = $amount_to_pay;

            $current_total_amount_due_left = $subcontractor_work['contract_amount']- $amount_to_pay;

            $previous_paid = $amount_to_pay;

            $amount_due_left = $subcontractor_work['contract_amount']- $subcontractor_work['total_current_paid_amount'];
  

                $swp_model = new SubContractorWorkPayments;

                $swp_model->subcontractorwork_id = $model->id;

                $swp_model->current_paid_amount = $amount_to_pay;

                $swp_model->date_payment =  $project_start_date;

                $swp_model->contract_amount = $subcontractor_work['contract_amount'];

                $swp_model->created_user_id = $subcontractor_work['created_user_id'];

                $swp_model->previous_paid_amount = $previous_paid;

                $swp_model->amount_due_left = $amount_due_left;

                $swp_model->save();

       }

        //$$subcontractor_work['created_user_id'];

        DB::commit();

        return $model->toArray();
    }


    public function update_subcontractor_work($subcontractor_work_id, Request $data) : array {

        DB::beginTransaction();

        if( $data->subcon_payment_id  ) {
               $subconwork_payment_updated_data = [

                'current_paid_amount' => $data->current_paid_amount

                ];

            SubContractorWorkPayments::where('id', $data->subcon_payment_id)->update($subconwork_payment_updated_data);
            
            
            //*  Gets SubCon Payment Info

            $current_subcon_work_payment = (new SubContractorWorkPayments)->where('id', $data->subcon_payment_id)->first();
           
            //*  Gets SubCon Info in SubConPayment Id

             $subconwork =  (new SubContractorWork)->where('id', $subcontractor_work_id)->first();

            $subcon_payment_date = date("Y-m-d", strtotime($current_subcon_work_payment->date_payment));


            $FirstDay = date("Y-m-d", strtotime("sunday last week"));

            $LastDay  = date("Y-m-d", strtotime("sunday this week"));


            //* If subcon payment is paid within this week, last payment amount should be updated...


            if($subcon_payment_date > $FirstDay && $subcon_payment_date < $LastDay){

                $subconwork_updated_amount = $subconwork->last_payment_amount;

                $subconwork_updated_data['last_payment_amount'] = $subconwork_updated_amount;

            }else {

                $total_previous_paid_amount = $subconwork->total_previous_paid_amount;

                $total_previous_paid_amount = $total_previous_paid_amount - $current_subcon_work_payment->current_paid_amount;

                $total_previous_paid_amount = $total_previous_paid_amount + $data->current_paid_amount;

                // $current_paid_amount_difference = $current_subcon_work_payment->current_paid_amount - $data->current_paid_amount;

                $subconwork_updated_amount = $total_previous_paid_amount;

             $subconwork_updated_data['total_previous_paid_amount'] = $subconwork_updated_amount;

            }
             
            $subconwork_updated_data['last_payment_amount'] = $subconwork_updated_amount;
 

            SubContractorWork::where('id', $subcontractor_work_id)->update($subconwork_updated_data);

            
            DB::commit();

            return SubContractorWork::find($subcontractor_work_id)->toArray();
 
        }



        if($data->warranty || !isset(($data->amount_to_pay))){
        
            /**
             * Edit/Update SubContractorWork: warranty/subcon info field or if only subcon work details is to be updated (no payments)
             */
            

            $subconwork_updated_data = [

                'transaction_date' => new Carbon($data->transaction_date),
                'updated_user_id' => \Auth::user()->id,

                'subcontractor' => $data->subcontractor,
                'contract_amount' => $data->contract_amount,
                'equipment'     => $data->equipment,
                'project'       => $data->project,
                'project_start_date' => new Carbon($data->transaction_date),
                'scope_of_work' => $data->scope_of_work
            ];

            if($data->warranty){

                 $subconwork_updated_data['warranty'] = $data->warranty;

            }

            SubContractorWork::where('id', $subcontractor_work_id)->update($subconwork_updated_data);

        }    

        /**
             * Add SubContractor Work Payments
                    via edit subcon work
        */ 

         else {
             
            $swp_list = (new SubContractorWorkPayments)->lockForUpdate()->where('subcontractorwork_id', $subcontractor_work_id)->get();
    
            $current_work = (new SubContractorWork)->lockForUpdate()->where('id', $subcontractor_work_id)->first();

            $current_total_previous_paid_amount = 0;
            $current_total_current_paid_amount = 0;
            $current_total_amount_due_left = 0;

            $last_payment_amount = $data->amount_to_pay;

            $previous_paid_total = 0;
            $previous_paid = 0;


            if(!isset($date) && !isset($date->date_payment)){
                
                $date_payment = date("Y-m-d");

            }else{

                $date_payment =  $data->date_payment;

            }

            SubContractorWork::where('id', $subcontractor_work_id)->update([

                'payment_update_at' => date("Y-m-d H:i:s")

                ]);


            /**
             * Store listing payment
             */
            $swp_model = new SubContractorWorkPayments;

            $swp_model->subcontractorwork_id = $current_work->id;

            $swp_model->contract_amount = $current_work->contract_amount;
            $swp_model->created_user_id = \Auth::user()->id;

            $swp_model->previous_paid_amount = 0;

            $swp_model->amount_due_left = 0;
           
            $swp_model->current_paid_amount = $data->amount_to_pay;

            $swp_model->date_payment = new Carbon($date_payment);

            $swp_model->save();

            DB::commit();

            return SubContractorWork::find($subcontractor_work_id)->toArray();


            /**
             * Simple Calculation
             */

            if(!$swp_list->isEmpty()){

                foreach ($swp_list as $key => $swp){

                    $current_total_previous_paid_amount += $swp['previous_paid_amount'];
                    $current_total_current_paid_amount += $swp['current_paid_amount'];
                    $current_total_amount_due_left += $swp['amount_due_left'];
                    
                    $previous_paid_total += $swp['current_paid_amount'];
                }

                if($current_total_previous_paid_amount == 0)
                    $current_total_previous_paid_amount += $data->amount_to_pay;

                $current_total_current_paid_amount += $data->amount_to_pay;
                $current_total_amount_due_left = bcsub($current_work->contract_amount, $current_total_current_paid_amount);

                $amount_due_left = bcsub($current_work->contract_amount, $current_total_current_paid_amount);

            } else {

                $amount_due_left = bcsub($current_work->contract_amount, $data->amount_to_pay);

                $current_total_current_paid_amount = $data->amount_to_pay;
                $current_total_amount_due_left = $amount_due_left;
            }


            /**
             * Store listing payment
             */
            $swp_model = new SubContractorWorkPayments;

            $swp_model->subcontractorwork_id = $current_work->id;

            $swp_model->contract_amount = $current_work->contract_amount;
            $swp_model->created_user_id = \Auth::user()->id;

            $swp_model->previous_paid_amount = 0;

            $swp_model->amount_due_left = $amount_due_left;
           
            $swp_model->current_paid_amount = $data->amount_to_pay;

            $swp_model->date_payment = new Carbon($date_payment);

            $swp_model->save();


            /**
             * Edit/Update SubContractorWork
             */

            SubContractorWork::where('id', $subcontractor_work_id)->update([

                'transaction_date' => new Carbon($data->transaction_date),

                'updated_user_id' => \Auth::user()->id,

                'total_previous_paid_amount' => 0,

                'contract_amount' => $data->contract_amount,

                'payment_update_at' => date("Y-m-d H:i:s"),

                'total_current_paid_amount' => $current_total_current_paid_amount,

                'last_payment_amount' => $last_payment_amount,

                'total_amount_due_left' => $current_total_amount_due_left,

            ]);

        }

        DB::commit();

        return SubContractorWork::find($subcontractor_work_id)->toArray();
    }

    /**
     * Check subcontractor_work stock and use
     */

    public function stocked_subcontractor_work()
    {
        return Monitoring::where('code',Monitoring::FUEL_STOCK_CODE)->first();
    }

    public function used_subcontractor_work()
    {
        return Monitoring::where('code',Monitoring::FUEL_USE_CODE)->first();
    }

    public function available_subcontractor_work($out, $update = true)
    {

        if(isset($out) && $out && $update)
            return bcadd(bcsub(($this->stocked_subcontractor_work())->value, ($this->used_subcontractor_work())->value), $out);

        return bcsub(($this->stocked_subcontractor_work())->value, ($this->used_subcontractor_work())->value);
    }

    public function updated_stocked_subcontractor_work($in, $current_in)
    {
        return bcadd(bcsub(($this->stocked_subcontractor_work())->value, $in), $current_in);
    }

    /**
     * @important
     * Update monitoring table subcontractor_work stock and use
     */
    public function update_monitoring($value, $type)
    {
        (new Monitoring)->where('code', $type)->update(['value' => $value]);

    }

    /**
     * @charts
     * Queries subcontractor_work table for charts
     * @subcontractor_work
     */
    public function subcontractor_work_chart_monthly_usage($filters)
    {
        $subcontractor_work = new SubContractorWork;

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

        $subcontractor_works =  $subcontractor_work
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
            foreach ($subcontractor_works as $subcontractor_work){
                if($subcontractor_work['monthYear'] == $date['year-month']){
                    $latest_data[$date['year-month']] = [
                        'year' => $date['year'],
                        'month' => \App\Helpers\DateHelper::monthsText()[$date['month']],
                        'total_consume' => $subcontractor_work['total_consume'],
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
     * Queries subcontractor_work table for charts
     * @subcontractor_work
     */
    public function subcontractor_work_chart_monthly_stock($filters)
    {
        $subcontractor_work = new SubContractorWork;

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

        $subcontractor_works =  $subcontractor_work
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
            foreach ($subcontractor_works as $subcontractor_work){
                if($subcontractor_work['monthYear'] == $date['year-month']){
                    $latest_data[$date['year-month']] = [
                        'year' => $date['year'],
                        'month' => \App\Helpers\DateHelper::monthsText()[$date['month']],
                        'total_stock' => $subcontractor_work['total_stock'],
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
     * Queries subcontractor_work table for charts
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
     * Queries subcontractor_work table for charts
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
