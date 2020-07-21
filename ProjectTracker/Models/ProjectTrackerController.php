<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Author extends Model
{
    /**
	 * The table associated with the model. For input select display
	 *
	 * @var string
	 */
    protected $table = 'authors';
	public $timestamps = true;

	public function get_authors_service_progress($author_services_id)
	{
		$authors_progress = DB::table('authors_progress')
 					->select('*')
 	 				->join('project_progress_steps', 'authors_progress.project_progress_steps_id', '=', 'project_progress_steps.project_progress_steps_id')
  					->where('author_services_id', $author_services_id)
// 					->join('users', 'users.id', '=', 'authors_progress.assigned_to_id')
					->get();

		return $authors_progress;
	}

	public function get_all_authors_services($author_id)
	{
		$authors_services = DB::table('authors')
 					->select('*')
 	 				->join('author_services', 'author_services.author_id', '=', 'authors.author_id')
 					->join('service_names', 'service_names.service_name_id', '=', 'author_services.service_name_id')
					->join('service_type', 'service_type.service_type_id', '=', 'author_services.service_type_id')
  					->where('authors.author_id', $author_id)
  					->where('authors.status', "Active")
 					->get();
 			   
		return $authors_services;
	}

	public function get_all_authors()
	{
		$authors = DB::table('authors')
 					->select('*')
   					->where('authors.status', "Active")
					->get();
 			   
		return $authors;
	}

	public function get_authors_services_list()
	{
		$author_services = DB::table('author_services')
 	 				->join('authors', 'author_services.author_id', '=', 'authors.author_id')
 					->join('service_names', 'service_names.service_name_id', '=', 'author_services.service_name_id')
					->join('service_type', 'service_type.service_type_id', '=', 'author_services.service_type_id')
 					->select('*')
   					->where('author_services.status', "Active")
					->get();
 			   
		return $author_services;
	}

	public function get_authors_services_byServiceId($service_type_id)
	{
		$author_services = DB::table('author_services')
 	 				->join('authors', 'author_services.author_id', '=', 'authors.author_id')
					->join('service_names', 'service_names.service_name_id', '=', 'author_services.service_name_id')
					->join('service_type', 'service_type.service_type_id', '=', 'author_services.service_type_id')
					->where('author_services.service_type_id', $service_type_id)
   					->where('author_services.status', "Active")
					->select('*')
  					->get();
 			   
		return $author_services;
	}
	
	public function get_author_info($author_id){

				$author_info = DB::table('authors')
 					->join('author_services', 'author_services.author_id', '=', 'authors.author_id')
 					->join('service_names', 'service_names.service_name_id', '=', 'author_services.service_name_id')
					->join('service_type', 'service_type.service_type_id', '=', 'author_services.service_type_id')
					->where('author_services.author_id', $author_id)
 					->first();

 				return $author_info;

	}				         

	public function get_author_service_info($author_service_id){

				$author_info = DB::table('authors')
 					->join('author_services', 'author_services.author_id', '=', 'authors.author_id')
 					->join('service_names', 'service_names.service_name_id', '=', 'author_services.service_name_id')
					->join('service_type', 'service_type.service_type_id', '=', 'author_services.service_type_id')
					->where('author_services.author_services_id', $author_service_id)
 					->first();

 				return $author_info;

	}				                   


	public function get_authors_services_byServiceId_filter($service_type_id)
	{
		$authors_dynamic_websites = DB::table('authors')
 	 				->join('author_services', 'author_services.author_id', '=', 'authors.author_id')
 					->join('service_names', 'service_names.service_name_id', '=', 'author_services.service_name_id')
					->join('service_type', 'service_type.service_type_id', '=', 'author_services.service_type_id')
					->where('author_services.service_type_id', $service_type_id)
   					->where('authors.status', "Active")
					->select('*')
  					->get();
 			   
		return $authors_dynamic_websites;
	}

	public function get_authors_book_fair_list()
	{
		$authors_book_fair_list = DB::table('authors')
  	 				->join('author_services', 'author_services.author_id', '=', 'authors.author_id')
					->join('service_names', 'service_names.service_name_id', '=', 'author_services.service_name_id')
					->where('authors.service_type_id', 2)
   					->where('authors.status', "Active")
					->select('*')
  					->get();
 			   
		return $authors_book_fair_list;
	}
 
	public function get_authors_book_trailer_list()
	{
		$authors_book_trailer_list = DB::table('authors')
 					->join('service_names', 'service_names.service_name_id', '=', 'authors.service_name_id')
					->where('authors.service_type_id', 3)
   					->where('authors.status', "Active")
					->select('*')
  					->get();
 			   
		return $authors_book_trailer_list;
	}

	public function get_authors_press_release_list()
	{
		$authors_press_release_list = DB::table('authors')
 					->join('service_names', 'service_names.service_name_id', '=', 'authors.service_name_id')
					->where('authors.service_type_id', 4)
   					->where('authors.status', "Active")
					->select('*')
  					->get();
 			   
		return $authors_press_release_list;
	}

	public function get_authors_blogging_list()
	{
		$authors_blogging_list = DB::table('authors')
 					->join('service_names', 'service_names.service_name_id', '=', 'authors.service_name_id')
					->where('authors.service_type_id', 5)
   					->where('authors.status', "Active")
					->select('*')
  					->get();
 			   
		return $authors_blogging_list;
	}

	public function get_authors_socialmedia_list()
	{
		$authors_socialmedia_list = DB::table('authors')
 					->join('service_names', 'service_names.service_name_id', '=', 'authors.service_name_id')
					->where('authors.service_type_id', 6)
   					->where('authors.status', "Active")
					->select('*')
  					->get();
 			   
		return $uthors_socialmedia_list;
	}

	public function get_authors_obp_list()
	{
		$authors_authors_obp_list = DB::table('authors')
 					->join('service_names', 'service_names.service_name_id', '=', 'authors.service_name_id')
					->where('authors.service_type_id', 7)
   					->where('authors.status', "Active")
					->select('*')
  					->get();
 			   
		return $authors_authors_obp_list;
	}

	public function get_authors_bookfair_wpr_list()
	{
		$authors_authors_bookfair_wpr_list = DB::table('authors')
 					->join('service_names', 'service_names.service_name_id', '=', 'authors.service_name_id')
					->where('service_type_id', 8)
   					->where('authors.status', "Active")
					->select('*')
  					->get();
 			   
		return $authors_authors_bookfair_wpr_list;
	}

	public function update_author_info($author_id, $fields){

				DB::table('authors')
					->where('author_id', $author_id)
 					->update(  $fields );
	}
 
 	public function insert_author_progress($author_id, $project_progress_steps_id, $fields_id){

				DB::table('authors_progress_id')
				        
				        ->where('author_id', $author_id)

						->update($fields);
	}

	public function insert_author_services( $fields ){

				DB::table('author_services')
				         ->insert([$fields]);
	}

	public function calendar_project_tracker(){

		
	}

}
