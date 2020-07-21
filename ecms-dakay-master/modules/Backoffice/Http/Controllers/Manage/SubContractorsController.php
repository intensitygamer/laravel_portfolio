<?php

namespace Modules\BackOffice\Http\Controllers\Manage;

use App\Models\SubContractor;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use App\Http\Requests\BackOffice\SubContractor\SubContractorCreateRequest;
use App\Http\Requests\BackOffice\SubContractor\SubContractorUpdateRequest;

use App\Commands\SubContractor\SubContractorSearchCommand;
use App\Commands\SubContractor\SubContractorDetailCommand;
use App\Commands\SubContractor\SubContractorCreatorCommand;
use App\Commands\SubContractor\SubContractorUpdateCommand;
use App\Commands\SubContractor\SubContractorDeleteCommand;

class SubContractorsController extends Controller
{

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        if (! (new \Permission)->can_manage_subcontractor_list())
            return view('errors.404');

        $subcontractors = (new SubContractorSearchCommand($request))->execute();
        $request->flash();

        return view('modules.backoffice.manage.subcontractor.subcontractors', [ 'subcontractors' => $subcontractors ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        if (! (new \Permission)->can_manage_subcontractor_create())
            return view('errors.404');

        return view('modules.backoffice.manage.subcontractor.subcontractor_create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(SubContractorCreateRequest $request)
    {
        if (! (new \Permission)->can_manage_subcontractor_create())
            return view('errors.404');

        try
        {
            (new SubContractorCreatorCommand($request))->execute();

            $response = ['status' => 'success', 'message' => 'SubContractor successfully created!', 'empty_field' => true];
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
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id, Request $request)
    {
        if (! (new \Permission)->can_manage_subcontractor_update())
            return view('errors.404');

        try
        {
            $subcontractor = (new SubContractorDetailCommand($id))->execute();

            $model = new SubContractor;
            $model->fill($subcontractor);

            $data = ['model' => $model, 'created_user_id' => \Auth::user()->id];

            return view('modules.backoffice.manage.subcontractor.subcontractor_edit', $data);
        }
        catch (\Exception $e)
        {
            \Log::info($e);
            $response = ['status' => 'error', 'message' => 'Something went wrong!'];
            $valid = false;
        }
    }


    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update($subcontractor_id, SubContractorUpdateRequest $request)
    {
        if (! (new \Permission)->can_manage_subcontractor_update())
            return view('errors.404');

        try
        {
            (new SubContractorUpdateCommand($subcontractor_id, $request))->execute();

            $response = ['status' => 'success', 'message' => 'SubContractor successfully updated!', 'refresh' => true];
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
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id, Request $request)
    {
        if (! (new \Permission)->can_manage_subcontractor_delete())
            return view('errors.404');

        try
        {
            (new SubContractorDeleteCommand($id))->execute();

            $request->session()->flash('success', 'Successfully deleted one item!');
            return redirect()->back();
        }
        catch (\Exception $e)
        {
            \Log::info($e);
            return $this->ajax_error_response($e->getMessage());
        }
    }
}
