<?php

namespace Modules\FrontOffice\Http\Controllers\Lubricant;

use App\Generators;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\FrontOffice\Lubricant\LubricantUseRequest;
use App\Http\Requests\FrontOffice\Lubricant\LubricantStockRequest;
use App\Http\Requests\FrontOffice\Lubricant\LubricantUpdateRequest;

use App\Commands\Lubricant\LubricantSearchCommand;
use App\Commands\Lubricant\LubricantCreatorCommand;
use App\Commands\Lubricant\LubricantDetailCommand;
use App\Commands\Lubricant\LubricantUpdateCommand;

class LubricantController extends Controller
{

    /**
     * Display a listing of the resource.
     * @return Response
     */
    function index(Request $request)
    {
        /*if (! (new \Permission)->can_manage_lubricant_list())
            return view('errors.404');*/

        $lubricants = (new LubricantSearchCommand($request))->execute();
        $request->flash();

        return view('modules.frontoffice.reports.lubricant.index', compact('lubricants'));
    }

    /**
     * Use views and store
     * @return Response
     */
    function use_lube()
    {
        /*if (! (new \Permission)->can_manage_lubricant_use())
            return view('errors.404');*/

        $transaction = (new Generators\TransactionCode)->generate('use_lube');

        return view('modules.frontoffice.reports.lubricant.use_lube', compact('transaction'));
    }

    function store_use_lube(LubricantUseRequest $request)
    {
        /*if (! (new \Permission)->can_manage_lubricant_use())
            return view('errors.404');*/

        try
        {
            (new LubricantCreatorCommand($request))->execute();

            $response = ['status' => 'success', 'message' => 'Lubricant successfully used!', 'empty_field' => true];
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
    function stock_lube()
    {
        /*if (! (new \Permission)->can_manage_lubricant_stock())
            return view('errors.404');*/

        $transaction = (new Generators\TransactionCode)->generate('stock_lube');

        return view('modules.frontoffice.reports.lubricant.stock_lube', compact('transaction'));
    }

    function store_stock_lube(LubricantStockRequest $request)
    {
        /*if (! (new \Permission)->can_manage_lubricant_stock())
            return view('errors.404');*/

        try
        {
            (new LubricantCreatorCommand($request))->execute();

            $response = ['status' => 'success', 'message' => 'Lubricant successfully stock!', 'empty_field' => true];
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
     * Edit stock and use
     * @return Response
     */
    public function edit($id, $type)
    {
        /*if (! (new \Permission)->can_manage_lubricant_update())
            return view('errors.404');*/

        try
        {
            $lubricant = (new LubricantDetailCommand($id))->execute();

            return view('modules.frontoffice.reports.lubricant.edit', compact('lubricant', 'type'));
        }
        catch (\Exception $e)
        {
            \Log::info($e);
            $response = ['status' => 'error', 'message' => 'Something went wrong!'];
            $valid = false;
        }

    }

    public function update($id, $type, LubricantUpdateRequest $request){

        /*if (! (new \Permission)->can_manage_lubricant_update())
            return view('errors.404');*/

        try
        {
            (new LubricantUpdateCommand($id, $request))->execute();

            $response = ['status' => 'success', 'message' => 'Lubricant successfully updated!', 'refresh' => true];
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
     * Regenerate Code for lubes
     */
    public function regenerate_transaction($type){

        return (new Generators\TransactionCode)->generate($type);
    }

}