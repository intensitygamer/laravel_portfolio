<?php

namespace App\Commands\Stock;

use Illuminate\Http\Request;

use App\Models\Monitoring;
use App\Repositories\Fuel\FuelRepository;
use App\Repositories\Lubricant\LubricantRepository;

class StockChartCommand
{
    protected $filters;
    protected $chart;

    public function __construct(Request $request)
    {
        $this->filters = [];
        $this->chart = [];

        if ($request->get('date_from', null) && $request->get('date_to', null))
        {
            $this->filters['date_from'] = $request->get('date_from');
            $this->filters['date_to'] = $request->get('date_to');
        }

        $this->request = $request;
    }

    public function execute()
    {
        /**
         * GET the value for first chart bar
         */
        $fuel = new FuelRepository;
        $lubricant = new LubricantRepository;

        $this->chart['use_fuel'] = ( ($fuel->stocked_fuel())->value == 0 ? 0 : bcmul( (($fuel->used_fuel())->value /
            ($fuel->stocked_fuel())->value), 100, 3));
        $this->chart['use_engine_oil'] = ( ($lubricant->stocked_lubricant(Monitoring::ENGINE_STOCK_CODE))->value ==
        0 ? 0 : bcmul( (($lubricant->used_lubricant(Monitoring::ENGINE_USE_CODE))->value / ($lubricant->stocked_lubricant(Monitoring::ENGINE_STOCK_CODE))->value), 100, 3) );
        $this->chart['use_hydraulic_oil'] = ( ($lubricant->stocked_lubricant(Monitoring::HYDRAULIC_STOCK_CODE))
            ->value == 0 ? 0 : bcmul( (($lubricant->used_lubricant(Monitoring::HYDRAULIC_USE_CODE))->value / ($lubricant->stocked_lubricant(Monitoring::HYDRAULIC_STOCK_CODE))->value), 100, 3) );
        $this->chart['use_gear_oil'] = ( ($lubricant->stocked_lubricant(Monitoring::GEAR_STOCK_CODE))->value == 0 ?
            0 : bcmul( (($lubricant->used_lubricant(Monitoring::GEAR_USE_CODE))->value / ($lubricant->stocked_lubricant(Monitoring::GEAR_STOCK_CODE))->value), 100, 3) );
        $this->chart['use_telluse'] = ( ($lubricant->stocked_lubricant(Monitoring::TELLUSE_STOCK_CODE))->value == 0
            ? 0 : bcmul( (($lubricant->used_lubricant(Monitoring::TELLUSE_USE_CODE))->value / ($lubricant->stocked_lubricant(Monitoring::TELLUSE_STOCK_CODE))->value), 100, 3) );

        /**
         * Query Chart by date
         * @fuel
         */
        $this->chart['fuel_monthly_usage'] = $fuel->fuel_chart_monthly_usage($this->filters);
        $this->chart['fuel_monthly_stock'] = $fuel->fuel_chart_monthly_stock($this->filters);

        /**
         * Query Chart by date
         * @lubricant
         */
        $this->chart['engine_monthly_usage'] = $fuel->lubricant_chart_monthly_usage($this->filters, Monitoring::ENGINE_USE_CODE, Monitoring::ENGINE_OIL_ID);
        $this->chart['engine_monthly_stock'] = $fuel->lubricant_chart_monthly_stock($this->filters, Monitoring::ENGINE_STOCK_CODE, Monitoring::ENGINE_OIL_ID);

        $this->chart['hydraulic_monthly_usage'] = $fuel->lubricant_chart_monthly_usage($this->filters, Monitoring::HYDRAULIC_USE_CODE, Monitoring::HYDRAULIC_OIL_ID);
        $this->chart['hydraulic_monthly_stock'] = $fuel->lubricant_chart_monthly_stock($this->filters, Monitoring::HYDRAULIC_STOCK_CODE, Monitoring::HYDRAULIC_OIL_ID);

        $this->chart['gear_monthly_usage'] = $fuel->lubricant_chart_monthly_usage($this->filters, Monitoring::GEAR_USE_CODE, Monitoring::GEAR_OIL_ID);
        $this->chart['gear_monthly_stock'] = $fuel->lubricant_chart_monthly_stock($this->filters, Monitoring::GEAR_STOCK_CODE, Monitoring::GEAR_OIL_ID);

        $this->chart['telluse_monthly_usage'] = $fuel->lubricant_chart_monthly_usage($this->filters, Monitoring::TELLUSE_USE_CODE, Monitoring::TELLUSE_ID);
        $this->chart['telluse_monthly_stock'] = $fuel->lubricant_chart_monthly_stock($this->filters, Monitoring::TELLUSE_STOCK_CODE, Monitoring::TELLUSE_ID);

        return $this->chart;
    }

}
