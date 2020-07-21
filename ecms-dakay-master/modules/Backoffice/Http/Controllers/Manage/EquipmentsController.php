<?php

namespace Modules\BackOffice\Http\Controllers\Manage;

use App\Commands\Equipment\EquipmentAuditCommand;
use App\Models\Equipment;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use App\Http\Requests\BackOffice\Equipment\EquipmentCreateRequest;
use App\Http\Requests\BackOffice\Equipment\EquipmentUpdateRequest;
use App\Http\Requests\BackOffice\Equipment\EquipmentUploadRequest;

use App\Commands\Equipment\EquipmentSearchCommand;
use App\Commands\Equipment\EquipmentDetailCommand;
use App\Commands\Equipment\EquipmentCreatorCommand;
use App\Commands\Equipment\EquipmentUpdateCommand;
use App\Commands\Equipment\EquipmentDeleteCommand;
use App\Commands\Equipment\EquipmentAuditChartCommand;

use App\Commands\UploadFile\UploadFileCommand;
use App\Commands\UploadFile\RemoveFileCommand;

class EquipmentsController extends Controller
{

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        if (! (new \Permission)->can_manage_equipment_list())
            return view('errors.404');

        $equipments = (new EquipmentSearchCommand($request))->execute();
        $request->flash();

        return view('modules.backoffice.manage.equipment.equipments', [ 'equipments' => $equipments ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        if (! (new \Permission)->can_manage_equipment_create())
            return view('errors.404');

        return view('modules.backoffice.manage.equipment.equipment_create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(EquipmentCreateRequest $request)
    {
        if (! (new \Permission)->can_manage_equipment_create())
            return view('errors.404');

        try
        {
            (new EquipmentCreatorCommand($request))->execute();

            $response = ['status' => 'success', 'message' => 'Equipment successfully created!', 'refresh' => true, 'with_upload' => true];
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
        if (! (new \Permission)->can_manage_equipment_update())
            return view('errors.404');

        try
        {
            $equipment = (new EquipmentDetailCommand($id))->execute();

            $model = new Equipment;
            $model->fill($equipment);


            $data = ['model' => $model, 'images'=> $equipment['equipment_images'], 'created_user_id' => \Auth::user()->id];

            return view('modules.backoffice.manage.equipment.equipment_edit', $data);
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
    public function update($equipment_id, EquipmentUpdateRequest $request)
    {
        if (! (new \Permission)->can_manage_equipment_update())
            return view('errors.404');

        try
        {
            (new EquipmentUpdateCommand($equipment_id, $request))->execute();

            $response = ['status' => 'success', 'message' => 'Equipment successfully updated!', 'refresh' => true];
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
        if (! (new \Permission)->can_manage_equipment_delete())
            return view('errors.404');

        try
        {
            (new EquipmentDeleteCommand($id))->execute();

            $request->session()->flash('success', 'Successfully deleted one item!');
            return redirect()->back();
        }
        catch (\Exception $e)
        {
            \Log::info($e);
            return $this->ajax_error_response($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function store_image(EquipmentUploadRequest $request)
    {
       /* if (! (new \Permission)->can_manage_equipment_uploads())
            return view('errors.404');*/
        try
        {
            $files = (new UploadFileCommand($request))->execute();

            $response = ['status' => 'success', 'message' => 'File successfully added!', 'files' => $files];
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
    public function remove_image($name)
    {
        /* if (! (new \Permission)->can_manage_equipment_remove_uploads())
             return view('errors.404');*/
        try
        {
            $file = (new RemoveFileCommand($name))->execute();

            $response = ['status' => 'success', 'message' => 'File successfully deleted!', 'file' => $file];
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
    public function remove_image_storage($name)
    {
        /* if (! (new \Permission)->can_manage_equipment_remove_uploads())
             return view('errors.404');*/
        try
        {
            $file = (new RemoveFileCommand($name))->executeStorage();

            $response = ['status' => 'success', 'message' => 'File successfully deleted!', 'file' => $file];
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
     * Display a listing of the resource.
     * @return Response
     */
    public function audit_equipment(Request $request)
    {
        /*if (! (new \Permission)->can_manage_equipment_audit())
            return view('errors.404');*/

        $equipment = [];

        if ($request->get('equipment', null))
            $equipment = (new EquipmentAuditCommand($request))->execute();

        $request->flash();

        return view('modules.backoffice.manage.equipment.audit', [ 'equipment' => $equipment ]);
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function audit_chart(Request $request)
    {
        /*if (! (new \Permission)->can_manage_equipment_audit())
            return view('errors.404');*/

        try
        {

            if ($request->get('date_from') && $request->get('date_to')){

                $equipment = (new EquipmentAuditChartCommand($request))->execute();
                $response = ['status' => 'success', 'message' => 'Showing chart successful', 'data' => $equipment];
                $valid = true;

            } else {
                $response = ['status' => 'error', 'message' => 'Invalid date. Please specify the date to search.'];
                $valid = false;
            }

        }
        catch (\Exception $e)
        {
            \Log::info($e);
            $response = ['status' => 'error', 'message' => 'Something went wrong!'];
            $valid = false;
        }


        return response()->json($response, ($valid ? 200 : 400));
    }
}
