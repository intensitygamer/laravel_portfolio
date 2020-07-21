<?php

namespace App\Repositories\Project;

use App\Models\Project;
use Core\Repository;
use Doctrine\DBAL\Query\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class ProjectRepository implements Repository\Project\ProjectRepository
{

    public function get_projects()
    {   

        
        if (isset($filter['name']))
        {

            $projects = Project::with(['location']);
            $projects->where('name', 'like', '%'.$filter['name'] .'%');
        }

        return $projects->toArray();
    }

    public function get_project_by_id($project_id)
    {
        return Project::with(['created_by'])->find($project_id)->toArray();
    }

    public function get_projects_list_by_key_id()
    {
        return Project::pluck('name','id');
    }

    public function save_project(array $data){
        DB::beginTransaction();
        try {
            $project = new Project;
            $project->created_user_id = Auth::user()->id;
            $project->name = $data['name'];
            $project->location = $data['location'];
            $project->save();

            DB::commit();
        } catch(QueryException $e) {

            DB::rollback();
            throw new \Exception('Error saving project', 500);

        } catch (\Exception $e) {

            DB::rollback();
            throw new \Exception($e->getMessage(), 500);
        }
    }
    public function update_project($project_id, Request $data ){
        DB::beginTransaction();

        try {
            // $data['created_user_id'] = Auth::user()->id;
            $project = Project::find($project_id);
            $project->update($data->toArray());

            DB::commit();
        } catch(QueryException $e) {

            DB::rollback();
            throw new \Exception('Error updating project', 500);

        } catch (\Exception $e) {

            DB::rollback();
            throw new \Exception($e->getMessage(), 500);
        }

    }
    public function delete_project($project_id){
        DB::beginTransaction();
        try {
            Project::find($project_id)->delete();
            DB::commit();
        } catch(QueryException $e) {

            DB::rollback();
            throw new \Exception('Error deleting project', 500);

        } catch (\Exception $e) {

            DB::rollback();
            throw new \Exception($e->getMessage(), 500);
        }
    }
}
