<?php

namespace Modules\FrontOffice\Http\Controllers\Project;

use App\Generators;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\FrontOffice\Project\ProjectCreateRequest;
// use App\Http\Requests\FrontOffice\Project\ProjectStockRequest;
use App\Http\Requests\FrontOffice\Project\ProjectUpdateRequest;

use App\Commands\Fuel\FuelSearchCommand;
use App\Commands\Fuel\FuelCreatorCommand;
use App\Commands\Fuel\FuelDetailCommand;
use App\Commands\Fuel\FuelUpdateCommand;

class ProjectController extends Controller
{

    /**
     * Display a listing of the resource.
     * @return Response
     */
    function index(Request $request)
    {   
        /*if (! (new \Permission)->can_manage_fuel_list())
            return view('errors.404');*/

        $fuels = (new ProjectSearchCommand($request))->execute();
        
        $filter  = true;
        $filter = ( $_GET === [] ? false : true );
            
        
        $request->flash();
        
        return view('modules.frontoffice.reports.project.index', compact('projects','filter'));
    }

    /**
     * Use views and store
     * @return Response
     */
    function use_fuel()
    {
        /*if (! (new \Permission)->can_manage_fuel_use())
            return view('errors.404');*/

        $transaction = (new Generators\TransactionCode)->generate('use_fuel');

        return view('modules.frontoffice.reports.fuel.use_fuel', compact('transaction'));
    }

    function store_use_fuel(FuelUseRequest $request)
    {
        /*if (! (new \Permission)->can_manage_fuel_use())
            return view('errors.404');*/

        try
        {
            (new FuelCreatorCommand($request))->execute();

            ($request->location !== trim('') ? true: false);

            $response = ['status' => 'success', 'message' => 'Fuel successfully used!', 'empty_field' => true];
            $valid = true;
        }
        catch (\Exception $e)
        {
            \Log::info($e);
            $response = ['status' => 'error', 'message' => (isset($e->errors) ? $e->errors : 'Something went wrong!')];
            $valid = false;
        }


        return response()->json($response, ($valid ? 200 : 400));
    }

    /**
     * Stock views and store
     * @return Response
     */
    function stock_fuel()
    {
        /*if (! (new \Permission)->can_manage_fuel_stock())
            return view('errors.404');*/

        $transaction = (new Generators\TransactionCode)->generate('stock_fuel');

        return view('modules.frontoffice.reports.fuel.stock_fuel', compact('transaction'));
    }

    function store_stock_fuel(FuelStockRequest $request)
    {
        /*if (! (new \Permission)->can_manage_fuel_stock())
            return view('errors.404');*/

        try
        {
            (new FuelCreatorCommand($request))->execute();

            $response = ['status' => 'success', 'message' => 'Fuel successfully stock!', 'empty_field' => true];
            $valid = true;
        }
        catch (\Exception $e)
        {
            \Log::info($e);
            $response = ['status' => 'error', 'message' => 'Something went wrong!'];
            $valid = false;
        }

        return response()->json($response, ($valid ? 200 : 400));
    }

    /**
     * Edit stock and use
     * @return Response
     */
    public function edit($id, $type)
    {

        /*if (! (new \Permission)->can_manage_fuel_update())
            return view('errors.404');*/

        try
        {
            $fuel = (new ProjectDetailCommand($id))->execute();

            return view('modules.frontoffice.reports.project.edit', compact('fuel', 'type'));
        }
        catch (\Exception $e)
        {
            \Log::info($e);
            $response = ['status' => 'error', 'message' => 'Something went wrong!'];
            $valid = false;
        }

    }

    public function update($id, ProjectUpdateRequest $request){

        /*if (! (new \Permission)->can_manage_fuel_update())
            return view('errors.404');*/

        try
        {
            (new ProjectUpdateCommand($id, $request))->execute();

            $response = ['status' => 'success', 'message' => 'Fuel successfully updated!', 'refresh' => true];
            $valid = true;
        }
        catch (\Exception $e)
        {
            \Log::info($e);
            $response = ['status' => 'error', 'message' => (isset($e->errors) ? $e->errors : 'Something went wrong!')];
            $valid = false;
        }


        return response()->json($response, ($valid ? 200 : 400));
    }

    /**
     * Regenerate Code for fuel
     */
    public function regenerate_transaction($type){

        return (new Generators\TransactionCode)->generate($type);
    }

}