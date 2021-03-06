<?php

namespace Modules\BackOffice\Http\Controllers\Manage;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use App\Http\Requests\BackOffice\Project\ProjectCreateRequest;
use App\Http\Requests\BackOffice\Project\ProjectUpdateRequest;

use App\Commands\Project\ProjectSearchCommand;
use App\Commands\Project\ProjectDetailCommand;
use App\Commands\Project\ProjectCreatorCommand;
use App\Commands\Project\ProjectUpdateCommand;
use App\Commands\Project\ProjectDeleteCommand;

class ProjectsController extends Controller
{

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        if (! (new \Permission)->can_manage_location_list())
            return view('errors.404');

        $projects = (new ProjectSearchCommand($request))->execute();
        $request->flash();

        return view('modules.backoffice.manage.project.projects', [ 'projects' => $projects ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        if (! (new \Permission)->can_manage_location_create())
            return view('errors.404');

        return view('modules.backoffice.manage.project.project_create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(ProjectCreateRequest $request)
    {
        if (! (new \Permission)->can_manage_location_create())
            return view('errors.404');

        try
        {
            (new ProjectCreatorCommand($request))->execute();

            $response = ['status' => 'success', 'message' => 'Project successfully created!', 'empty_field' => true];
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
            $project = (new ProjectDetailCommand($id))->execute();

            $model = new Project;
            $model->fill($project);

            $data = ['model' => $model, 'created_user_id' => \Auth::user()->id];

            return view('modules.backoffice.manage.project.project_edit', $data);
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
    public function update($project_id, ProjectUpdateRequest $request)
    {
        if (! (new \Permission)->can_manage_location_update())
            return view('errors.404');

        try
        {
            (new ProjectUpdateCommand($project_id, $request))->execute();

            $response = ['status' => 'success', 'message' => 'Project successfully updated!', 'refresh' => true];
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
