<?php

namespace App\Repositories\Equipment;

use Core\Repository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Equipment;

class EquipmentAuditRepository implements Repository\Equipment\EquipmentAuditRepository
{
    public function audit_equipment(Request $data) : array
    {

        $model = new Equipment;

        $equipments = $model->with([
            'created_by',
            'subcontractor_works',
            'lubricant_engine_oil',
            'lubricant_hydraulic_oil',
            'lubricant_gear_oil',
            'lubricant_telluse_oil',
            'fuel_oil',
            'latest_location',
            'no_of_hours',
            'millage',
            'equipment_images',
        ])->find($data->equipment)->toArray();

        return $equipments;
    }

    public function get_fuel_by_date($filters, $equipment_id)
    {
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
        }

        $equipments = new Equipment;

        $equipments =  $equipments
            ->join('fuel_monitoring','fuel_monitoring.equipment','=','equipments.id')
            ->selectRaw("CONCAT(year(`transaction_date`), '-', month(`transaction_date`)) as monthYear, month(`transaction_date`) as month, sum(IFNULL(`out`,0)) as total_consume")
            ->where('equipments.id', $equipment_id)
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
            foreach ($equipments as $equipment){
                if($equipment['monthYear'] == $date['year-month']){
                    $latest_data[$date['year-month']] = [
                        'year' => $date['year'],
                        'month' => \App\Helpers\DateHelper::monthsText()[$date['month']],
                        'total_consume' => $equipment['total_consume'],
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

    public function get_lubricant_by_date($filters, $equipment_id, $oil_id)
    {
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
        }

        $equipments = new Equipment;

        $equipments =  $equipments
            ->join('lubricant_monitoring','lubricant_monitoring.equipment','=','equipments.id')
            ->selectRaw("CONCAT(year(`transaction_date`), '-', month(`transaction_date`)) as monthYear, month(`transaction_date`) as month, sum(IFNULL(`out`,0)) as total_consume")
            ->where([
                ['equipments.id', '=', $equipment_id],
                ['type_of_oil_id', '=', $oil_id],
            ])
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
            foreach ($equipments as $equipment){
                if($equipment['monthYear'] == $date['year-month']){
                    $latest_data[$date['year-month']] = [
                        'year' => $date['year'],
                        'month' => \App\Helpers\DateHelper::monthsText()[$date['month']],
                        'total_consume' => $equipment['total_consume'],
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

    public function get_no_of_repairs_by_date($filters, $equipment_id)
    {
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
        }

        $equipments = new Equipment;

        $equipments =  $equipments
            ->join('subcontractorworks','subcontractorworks.equipment','=','equipments.id')
            ->selectRaw("CONCAT(year(`transaction_date`), '-', month(`transaction_date`)) as monthYear, month(`transaction_date`) as month, sum(IFNULL(subcontractorworks.contract_amount, 0)) as contract_amount, count(subcontractorworks.id) as number_of_repair")
            ->where('equipments.id', $equipment_id)
            ->whereRaw( "month(`transaction_date`) in (". $months_in .")")
            ->groupBy("monthYear")
            ->groupBy("month")
            ->get()->toArray();

        $latest_data = [];

        foreach ($dates as $date){
            $latest_data[$date['year-month']] = [
                'year' => $date['year'],
                'month' => \App\Helpers\DateHelper::monthsText()[$date['month']],
                'number_of_repair' => 0,
                'contract_amount' => 0,
            ];
            foreach ($equipments as $equipment){
                if($equipment['monthYear'] == $date['year-month']){
                    $latest_data[$date['year-month']] = [
                        'year' => $date['year'],
                        'month' => \App\Helpers\DateHelper::monthsText()[$date['month']],
                        'number_of_repair' => $equipment['number_of_repair'],
                        'contract_amount' => $equipment['contract_amount'],
                    ];
                }
            }
        }

        $data = ['labels'=>[], 'datasets'=>[], 'datasets_2'=>[], 'total_contract_amount'=>0, 'total_of_number_of_repair'=>0];

        foreach (array_unique($latest_data, SORT_REGULAR) as $key => $item) {
            array_push($data['labels'], $item['year'].'-'.$item['month'] );
            array_push($data['datasets'], $item['number_of_repair'] );
            array_push($data['datasets_2'], $item['contract_amount'] );

            $data['total_of_number_of_repair'] += $item['number_of_repair'];
            $data['total_contract_amount'] += $item['contract_amount'];
        }

        return $data;
    }

}
