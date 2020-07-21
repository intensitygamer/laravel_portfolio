<?php

namespace Modules\FrontOffice\Http\Controllers\SubContractorWork;

use App\Generators;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\FrontOffice\SubContractorWork\SubContractorWorkCreateRequest;
use App\Http\Requests\FrontOffice\SubContractorWork\SubContractorWorkUpdateRequest;

use App\Commands\SubContractorWork\SubContractorWorkSearchCommand;
use App\Commands\SubContractorWork\SubContractorWorkCreatorCommand;
use App\Commands\SubContractorWork\SubContractorWorkDetailCommand;
use App\Commands\SubContractorWork\SubContractorWorkUpdateCommand;

use App\Commands\SubContractorWork\SubContractorWorkAuditCommand;

class SubContractorWorkController extends Controller
{

    /**
     * Display a listing of the resource.
     * @return Response
     */
    function index(Request $request)
    {
        /*if (! (new \Permission)->can_manage_subcontractorwork_list())
            return view('errors.404');*/

        $subcontractorworks = (new SubContractorWorkSearchCommand($request))->execute();
        $request->flash();

        return view('modules.frontoffice.reports.subcontractorwork.index', compact('subcontractorworks'));
    }

    /**
     * Use views and store
     * @return Response
     */
    function create_subcontractor_work()
    {
        /*if (! (new \Permission)->can_manage_subcontractorwork_create())
            return view('errors.404');*/

        $transaction = (new Generators\TransactionCode)->generate('subcontractor_work');

        return view('modules.frontoffice.reports.subcontractorwork.create_subcontractor_work', compact('transaction'));
    }

    function store_subcontractor_work(SubContractorWorkCreateRequest $request)
    {
        /*if (! (new \Permission)->can_manage_subcontractorwork_create())
            return view('errors.404');*/

        try
        {
            (new SubContractorWorkCreatorCommand($request))->execute();

            $response = ['status' => 'success', 'message' => 'Sub Contractor Work successfully created!', 'empty_field' => true];
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
     * Edit Sub Contractor Work
     * @return Response
     */
    public function edit_subcontractor_work($id)
    {

        /*if (! (new \Permission)->can_manage_subcontractorwork_update())
            return view('errors.404');*/

        try
        {
            $subcontractorwork = (new SubContractorWorkDetailCommand($id))->execute();

            return view('modules.frontoffice.reports.subcontractorwork.edit_subcontractor_work', compact('subcontractorwork'));
        }
        catch (\Exception $e)
        {
            \Log::info($e);
            $response = ['status' => 'error', 'message' => 'Something went wrong!'];
            $valid = false;
        }

    }

    public function update_subcontractor_work($id, SubContractorWorkUpdateRequest $request){

        /*if (! (new \Permission)->can_manage_subcontractorwork_update())
            return view('errors.404');*/

        try
        {
            (new SubContractorWorkUpdateCommand($id, $request))->execute();

            $response = ['status' => 'success', 'message' => 'Sub Contractor Work successfully updated!', 'refresh' => true];
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
     * Display a listing of the resource.
     * @return Response
     */
    function audit(Request $request)
    {
        /*if (! (new \Permission)->can_manage_subcontractorwork_audit())
            return view('errors.404');*/

        $subcontractorworks = (new SubContractorWorkAuditCommand($request))->execute();

        $request->flash();

        return view('modules.frontoffice.reports.subcontractorwork.audit', compact('subcontractorworks'));
    }

}