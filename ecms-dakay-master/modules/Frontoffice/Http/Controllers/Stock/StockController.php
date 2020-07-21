<?php

namespace Modules\FrontOffice\Http\Controllers\Stock;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Commands\Stock\StockChartCommand;

class StockController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        /*if (! (new \Permission)->can_manage_stock_list())
            return view('errors.404');*/

        $charts = (new StockChartCommand($request))->execute();
        //$request->flash();

        return view('modules.frontoffice.reports.stock.index', compact('charts'));
    }

}