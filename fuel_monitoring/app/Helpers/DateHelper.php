<?php

namespace App\Helpers;

use Carbon\Carbon;

class DateHelper
{

    function human_date($date, $opts = false)
    {
        if (strtotime($date) <=0) {
            return $date;
        }

        if($opts){
            return date('M j, Y', strtotime($date));
        }

        return date('M j, Y h:i A', strtotime($date));
    }

    function transaction_date($date)
    {
        if (strtotime($date) <=0) {
            return $date;
        }

        return date('m/j/Y', strtotime($date));
    }

    function transaction_time($date)
    {
        if (strtotime($date) <=0) {
            return $date;
        }

        return date('h:i A', strtotime($date));
    }


    public static function months()
    {
        $numberMonths = [];
        for ($i = 1; $i < 13; $i++) {
            $numberMonths[$i] = $i;
        }

        return $numberMonths;
    }

    public static function monthsText()
    {
        return [
            "1" => 'Jan',
            "2" => 'Feb',
            "3" => 'Mar',
            "4" => 'Apr',
            "5" => 'May',
            "6" => 'Jun',
            "7" => 'Jul',
            "8" => 'Aug',
            "9" => 'Sept',
            "10" => 'Oct',
            "11" => 'Nov',
            "12" => 'Dec'
        ];
    }

    public static function month_list(){

         
        $month_list = array("Select Month", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

        return $month_list;

    }

    public static function dates()
    {
        $dates = [];
        for ($i = 1; $i <= 31; $i++) {
            $dates[$i] = $i;
        }

        return $dates;
    }

    public static function years()
    {
        $year = Carbon::now()->year;
        $years = [];
        for ($i = $year; $i >= 1960; $i--) {
            $years[$i] = $i;
        }

        return $years;
    }

    public static function now(){
        return Carbon::now('Asia/Singapore');
    }

    public static function get_between_dates($start, $end, $opts = 'm')
    {
        $start    = (new \DateTime($start));
        $end      = (new \DateTime($end));
        $interval = ($opts == 'd' ? \DateInterval::createFromDateString('1 day') : \DateInterval::createFromDateString('1 month'));
        $periods   = new \DatePeriod($start, $interval, $end);
        $data = [];

        foreach ($periods as $period) {

            switch ($opts){
                case 'm':
                    $data[] = ['year' => $period->format("Y"), 'month' => $period->format("n"), 'year-month' => $period->format("Y-n")];
                    break;
                case 'y':
                    $data[] = ['year' => $period->format("y"), 'year-month' => $period->format("Y-n")];
                    break;
                case 'd':
                    $data[] = ['date' => $period->format("Y-m-d")];
                    break;
            }
        }

        return $data;
    }

    public static function check_date_is_this_week($date){

            $FirstDay = date("Y-m-d", strtotime("sunday last week"));

            $LastDay  = date("Y-m-d", strtotime("sunday this week"));

            $date  = date("Y-m-d", strtotime($date));
            
            if($date > $FirstDay && $date < $LastDay){
            
            return true;

            } else {

                return false;
            }
                           
    }

}