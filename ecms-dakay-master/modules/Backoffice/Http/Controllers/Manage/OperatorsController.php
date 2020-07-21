<?php

namespace Modules\BackOffice\Http\Controllers\Manage;

use App\Models\Operator;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use App\Http\Requests\BackOffice\Operator\OperatorCreateRequest;
use App\Http\Requests\BackOffice\Operator\OperatorUpdateRequest;

use App\Commands\Operator\OperatorSearchCommand;
use App\Commands\Operator\OperatorDetailCommand;
use App\Commands\Operator\OperatorCreatorCommand;
use App\Commands\Operator\OperatorUpdateCommand;
use App\Commands\Operator\OperatorDeleteCommand;

class OperatorsController extends Controller
{

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        if (! (new \Permission)->can_manage_operator_list())
            return view('errors.404');

        $operators = (new OperatorSearchCommand($request))->execute();
        $request->flash();

        return view('modules.backoffice.manage.operator.operators', [ 'operators' => $operators ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        if (! (new \Permission)->can_manage_operator_create())
            return view('errors.404');

        return view('modules.backoffice.manage.operator.operator_create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(OperatorCreateRequest $request)
    {
        if (! (new \Permission)->can_manage_operator_create())
            return view('errors.404');

        try
        {
            (new OperatorCreatorCommand($request))->execute();

            $response = ['status' => 'success', 'message' => 'Operator successfully created!', 'empty_field' => true];
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
        if (! (new \Permission)->can_manage_operator_update())
            return view('errors.404');

        try
        {
            $operator = (new OperatorDetailCommand($id))->execute();

            $model = new Operator;
            $model->fill($operator);

            $data = ['model' => $model, 'created_user_id' => \Auth::user()->id];

            return view('modules.backoffice.manage.operator.operator_edit', $data);
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
    public function update($operator_id, OperatorUpdateRequest $request)
    {
        if (! (new \Permission)->can_manage_operator_update())
            return view('errors.404');

        try
        {
            (new OperatorUpdateCommand($operator_id, $request))->execute();

            $response = ['status' => 'success', 'message' => 'Operator successfully updated!', 'refresh' => true];
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
        if (! (new \Permission)->can_manage_operator_delete())
            return view('errors.404');

        try
        {
            (new OperatorDeleteCommand($id))->execute();

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
