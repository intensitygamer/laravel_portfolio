<?php

namespace Modules\BackOffice\Http\Controllers\Manage;

use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use App\Http\Requests\BackOffice\Location\LocationCreateRequest;
use App\Http\Requests\BackOffice\Location\LocationUpdateRequest;

use App\Commands\Location\LocationSearchCommand;
use App\Commands\Location\LocationDetailCommand;
use App\Commands\Location\LocationCreatorCommand;
use App\Commands\Location\LocationUpdateCommand;
use App\Commands\Location\LocationDeleteCommand;

class LocationsController extends Controller
{

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        if (! (new \Permission)->can_manage_location_list())
            return view('errors.404');

        $locations = (new LocationSearchCommand($request))->execute();
        $request->flash();

        return view('modules.backoffice.manage.location.locations', [ 'locations' => $locations ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        if (! (new \Permission)->can_manage_location_create())
            return view('errors.404');

        return view('modules.backoffice.manage.location.location_create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(LocationCreateRequest $request)
    {
        if (! (new \Permission)->can_manage_location_create())
            return view('errors.404');

        try
        {
            (new LocationCreatorCommand($request))->execute();

            $response = ['status' => 'success', 'message' => 'Location successfully created!', 'empty_field' => true];
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
        if (! (new \Permission)->can_manage_location_update())
            return view('errors.404');

        try
        {
            $location = (new LocationDetailCommand($id))->execute();

            $model = new Location;
            $model->fill($location);

            $data = ['model' => $model, 'created_user_id' => \Auth::user()->id];

            return view('modules.backoffice.manage.location.location_edit', $data);
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
    public function update($location_id, LocationUpdateRequest $request)
    {
        if (! (new \Permission)->can_manage_location_update())
            return view('errors.404');

        try
        {
            (new LocationUpdateCommand($location_id, $request))->execute();

            $response = ['status' => 'success', 'message' => 'Location successfully updated!', 'refresh' => true];
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
        if (! (new \Permission)->can_manage_location_delete())
            return view('errors.404');

        try
        {
            (new LocationDeleteCommand($id))->execute();

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
