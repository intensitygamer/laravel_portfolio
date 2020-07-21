<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Progress extends Model
{
    /**
	 * The table associated with the model. For input select display
	 *
	 * @var string
	 */

    public $timestamp = true;

    protected $table = 'project_progress_steps';
 
	public function get_service_progress_steps($service_type_id)
	{
		$progress_steps = DB::table('project_progress_steps')
					->join('departments', 'departments.dept_id', '=', 'project_progress_steps.assigned_by_dept_id')
 					->select('*')
 					->orderby('step_sequence_no', 'ASC')
   					->where('project_progress_steps.status', "Active")
					->where('service_type_id', $service_type_id)
  					->get();
 			   
		return $progress_steps;
	}  

	public function get_project_progress_steps_byserviceid($service_type_id)
	{
		$progress_steps = DB::table('project_progress_steps')
 					->select('*')
					->orderby('step_sequence_no', 'ASC')
   					->where('project_progress_steps.status', "Active")
					->where('service_type_id', $service_type_id)
  					->get();
 			   
		return $progress_steps;
	}  

	public function get_project_progress_steps_by_stepno($service_type_id, $step_no)
	{
		$progress_steps = DB::table('project_progress_steps')
 					->select('*')
					->orderby('step_no', 'ASC')					
					->orderby('step_sequence_no', 'ASC')
   					->where('project_progress_steps.status', "Active")
					->where('service_type_id', $service_type_id)
					->where('step_no', $step_no)
  					->get();
 			   
		return $progress_steps;
	}  

 
	public function get_progress_steps_cnt_by_servicetypeid($service_type_id)
	{
		$progress_steps_cnt = DB::table('project_progress_steps')
   					->where('project_progress_steps.status', "Active")
					->where('service_type_id', $service_type_id)
 					->max('step_no');
  			   
		return $progress_steps_cnt;
	}  


	public function is_author_projectProgress_exist($author_services_id, $project_progress_steps_id){

		$author_project_status = DB::table('authors_progress')
 				   		->where('author_services_id', $author_services_id)
				   		->where('project_progress_steps_id', $project_progress_steps_id)
				   		->get()
				   		->count();

		 return $author_project_status;
 
	}

	public function insert_progress_authors($fields){

				DB::table('authors_progress')->insert(
				    $fields
				);
	}

	public function update_progress_authors($author_id, $project_progress_steps_id, $fields){

				DB::table('authors_progress')
					->where('author_services_id', $author_id)
					->where('project_progress_steps_id', $project_progress_steps_id)
					->update(
				    $fields
				);
	}



}
