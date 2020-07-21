<?php

namespace App\Http\Controllers;

use Auth;
use Redirect;
use App\ProjectTacker;
use DateTime;
use App\Author;
use App\User;
use App\Service;
use App\Role;
use App\Progress;
use App\UserModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Mail\Mailer;
use Mail;
use PHPExcel; 
use PHPExcel_IOFactory; 


class ProjectTrackerController extends Controller
{

 
    public function __construct()
    {
        
        $this->middleware('auth');

        $usermodel               =  new UserModel;

    }
 

     public function add_authors(){


     		$service                    = new Service;

     		$service_types              = $service->get_all_service_types();
     		$dynamic_service_names 		= $service->get_dynamicwebsite_service_names();
     		$bookfair_service_names 	= $service->get_bookfair_service_names();
     		$booktrailer_service_names 	= $service->get_booktrailer_service_names();
     		$pressrelease_service_names = $service->get_pressrelease_service_names();
     		$blogging_service_names		= $service->get_blogging_service_names();
     		$socialmedia_service_names 	= $service->get_socialmedia_service_names();
     		$obp_service_names 			= $service->get_obp_service_names();
     		$bookfairwpr_service_names 	= $service->get_bookfairwpr_service_names();

            foreach($service_types as $service_type_row){

                    $service_types_lists[$service_type_row->service_type_id]['services']    =   $service->get_servicenames_by_servicetypeid($service_type_row->service_type_id); 
                    $service_types_lists[$service_type_row->service_type_id]['index']       =   $service_type_row->service_type_id; 
            }

 
			return view('pages.add_authors', [	'service_types' => $service_types, 

												'service_types_lists' => $service_types_lists
                                                
												]);

     }

    
    public function export_excel_author_services($service_type_id){


        /** Error reporting */ 
        // error_reporting(E_ALL); 

        /** Include path **/ 
        //ini_set('include_path', ini_get('include_path').';../Classes/'); 

        // Create new PHPExcel object 

        $author_model                 = new Author;
        $progress_model               = new Progress;
        $objPHPExcel                  = new PHPExcel; 
            
         // Setting Excel file properties 
        // Change the properties detail as per your requirement 
        $objPHPExcel->getProperties()->setCreator("Jasbir"); 
        $objPHPExcel->getProperties()->setLastModifiedBy("Pradeep"); 
        $objPHPExcel->getProperties()->setTitle("Employee Details"); 
        $objPHPExcel->getProperties()->setSubject("Employee DOJ Informaton"); 
        $objPHPExcel->getProperties()->setDescription("Excel 2007 file generated using PHP."); 

        // Select current sheet 
        $objPHPExcel->setActiveSheetIndex(0); 
        // Add some data 
        $objPHPExcel->getActiveSheet()->SetCellValue('A8', ''); 
        $objPHPExcel->getActiveSheet()->SetCellValue('B8', 'Lead ID'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('C8', 'Author Name'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('D8', 'Service Name'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('E8', 'Sold Date'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('F8', 'Payment Terms'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('G8', 'Duration'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('H8', 'Porgress Rate'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('I8', ''); 

        $objPHPExcel->getActiveSheet()->SetCellValue('J7', 'STEPS'); 
 
        $objPHPExcel->getActiveSheet()->SetCellValue('C4', 'DATE TODAY: '); 
        $objPHPExcel->getActiveSheet()->SetCellValue('C5', date("m/d/y"));

        //column number, which we will be incrementing 
        $colnum = 9; 

        $result     = $author_model->get_authors_services_byServiceId($service_type_id);
        
        $service_type_steps = $progress_model->get_service_progress_steps($service_type_id);

        $row_letter = 'I';
        
        $row_cnt = 1;

        foreach($service_type_steps as $service_type_steps_row){
            
            $row_letter++;

            $objPHPExcel->getActiveSheet()->SetCellValue($row_letter."8", $service_type_steps_row->step_name);
            
            $row_cnt++;

        }

        $i = 1;

        foreach ($result as $row)
        { 

            $colnum++;

            $objPHPExcel->getActiveSheet()->SetCellValue('A'."$colnum", $i);
            $objPHPExcel->getActiveSheet()->SetCellValue('B'."$colnum", $row->lead_id);
            $objPHPExcel->getActiveSheet()->SetCellValue('C'."$colnum", $row->author_name);
            $objPHPExcel->getActiveSheet()->SetCellValue('D'."$colnum", $row->service_type . '- '. $row->service_name);
            $objPHPExcel->getActiveSheet()->SetCellValue('E'."$colnum", date("d-M-y", strtotime($row->sold_date)));
            $objPHPExcel->getActiveSheet()->SetCellValue('F'."$colnum", $row->payment_terms);       

            $date1 = new DateTime( $row->sold_date );
            $date2 = new DateTime(date("Y-m-d"));
            $diff = $date1->diff($date2);

            $date_difference  = ($diff->y). "y ";
            $date_difference .= ($diff->m). "m ";
            $date_difference .= ($diff->d). "d";
 
            $objPHPExcel->getActiveSheet()->SetCellValue('G'."$colnum", $date_difference);            

            $i++;

            $row_letter = 'I';
        
            $author_prog = $author_model->get_authors_service_progress($row->author_services_id);

            $completed_cnt = 0;

            foreach($author_prog as $author_prog_row){
                
                $author_arr[$author_prog_row->project_progress_steps_id] = $author_prog_row->step_status;

                if($author_prog_row->step_status == "COMPLETED")
                    $completed_cnt++;

            }

            //for($row_cnt_author_prog = 1; $row_cnt_author_prog < $row_cnt; $row_cnt_author_prog++){
           
           $row_cnt_author_prog = 1;

             foreach($service_type_steps as $service_type_steps_row){
                
                 $row_letter++;

                 if(isset($author_arr[$service_type_steps_row->project_progress_steps_id]))
                 
                     $objPHPExcel->getActiveSheet()->SetCellValue($row_letter."$colnum", $author_arr[$service_type_steps_row->project_progress_steps_id]);
                
                $row_cnt_author_prog++;

            }

            empty($author_arr);
            
            $objPHPExcel->getActiveSheet()->SetCellValue('H'."$colnum", number_format(( $completed_cnt / ($row_cnt_author_prog)) * 100, 2));       

        } 
        

        // Optionally, set the title of the Sheet 
        $objPHPExcel->getActiveSheet()->setTitle('Simple'); 
          
        // Create a write object to save the the excel 
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007'); 

        // save to a file 
        $objWriter->save('Author_Services.xls'); 

        // You may optionally output the data directly to a browser, here's how 
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'); 
        header('Content-Disposition: attachment;filename="Employees.xls"'); 
        header('Cache-Control: max-age=0'); 
        $objWriter->save('php://output'); 


    }

    public function all_authorsServices_lists(Request $request){


            $progress                = new Progress;

            $author                  = new Author;

            $service                 = new Service;

            $role                    = new Role;

            $usermodel               = new UserModel;

            $filters = "";

            $service_types  = $service->get_all_service_types();

            foreach($service_types as $service_type_row){

                    $service_progress_steps[$service_type_row->service_type_id]    = $progress->get_project_progress_steps_byserviceid($service_type_row->service_type_id);
            }


            if($request->has('_token') ) {

                 $all_authorsList =  $author->get_authors_services_list();

            }else{

                 $all_authorsList =  $author->get_authors_services_list($filters);

            }

            $user_acct = Auth::user();
            
            $user_role  = $role->get_role_info($user_acct->role_by_id);

            $users_lists = $usermodel->get_all_users();


            // Make Array of Users for Assignment Dropdown Purposes

            foreach ($users_lists as $users_lists_row) {
                $users_arr[$users_lists_row->id] = $users_lists_row->name;
            }
 
            //* If Admin

            $users = array();

            if($user_acct->role_by_id == 1){

                 $role_by_ids = [5];

                 $users                  = $usermodel->get_all_users();
            }

            //* If BFS POC

            if($user_acct->role_by_id == 2){

                 $role_by_ids = [2, 3, 4];

                 $users = $usermodel->get_all_users_restrict_by_poc($role_by_ids);

            }

            //* If Fulfillment POC

            if($user_acct->role_by_id == 5){

                 $role_by_ids = [5];

                 $users = $usermodel->get_all_users_restrict_by_poc($role_by_ids);

            }
 
			return view('pages.all_authorsServices_lists', [ 'list_authors' => $all_authorsList, 

                                                            'service_progress_steps' => $service_progress_steps,

                                                             'user_acct'                => $user_acct,

                                                             'users'                    => $users

                                                            ]);

     }

     public function authors_service_project_lists(Request $request){
        
            $service_type_id                = $request->service_type_id;

            // validation to request url with service_type_id not in range ...

           switch($service_type_id){

                    case 1: 
                    case 2: 
                    case 3: 
                    case 4: 
                    case 5: 
                    case 6: 
                    case 7: 
                    case 8:

                    continue;

                default:
                    return redirect()->back();


            }

     		$progress 				 = new Progress;

            $author                  = new Author;

            $usermodel               = new UserModel;

            $service                 = new Service;

            $role                    = new Role;

            $service_types           = $service->get_all_service_types();

            //* For Adding Authors Drop Down...

            $dynamic_service_names      = $service->get_dynamicwebsite_service_names();
            $bookfair_service_names     = $service->get_bookfair_service_names();
            $booktrailer_service_names  = $service->get_booktrailer_service_names();
            $pressrelease_service_names = $service->get_pressrelease_service_names();
            $blogging_service_names     = $service->get_blogging_service_names();
            $socialmedia_service_names  = $service->get_socialmedia_service_names();
            $obp_service_names          = $service->get_obp_service_names();
            $bookfairwpr_service_names  = $service->get_bookfairwpr_service_names();

            foreach($service_types as $service_type_row){

                    $service_types_lists[$service_type_row->service_type_id]['services']    =   $service->get_servicenames_by_servicetypeid($service_type_row->service_type_id); 
                    $service_types_lists[$service_type_row->service_type_id]['index']       =   $service_type_row->service_type_id; 
            }


            $user_acct = Auth::user();
            
            $user_role  = $role->get_role_info($user_acct->role_by_id);

            $users_lists = $usermodel->get_all_users();


            // Make Array of Users for Assignment Dropdown Purposes

            foreach ($users_lists as $users_lists_row) {
                $users_arr[$users_lists_row->id] = $users_lists_row->name;
            }
 
            //* If Admin

            $users = array();

            if($user_acct->role_by_id == 1){

                 $role_by_ids = [5];

                 $users                  = $usermodel->get_all_users();
            }

            //* If BFS POC

            if($user_acct->role_by_id == 2){

                 $role_by_ids = [2, 3, 4];

                 $users = $usermodel->get_all_users_restrict_by_poc($role_by_ids);

            }

            //* If Fulfillment POC

            if($user_acct->role_by_id == 5){

                 $role_by_ids = [5];

                 $users = $usermodel->get_all_users_restrict_by_poc($role_by_ids);

            }


			$serviceNames 		            = $service->get_servicenames_by_servicetypeid($service_type_id);

            $service_type_info              = $service->get_service_type_info($service_type_id);
 
            $service_progress               = $progress->get_project_progress_steps_byserviceid($service_type_id);             

            $author_services_lists          = $author->get_authors_services_byServiceId($service_type_id);
            
            $service_progress_steps         = $progress->get_service_progress_steps($service_type_id);


            // Loop for All Authors

            $i = 0;  

            $authors_progress = array();

            foreach($author_services_lists as $row){

                //* $authors_prog[$author_services_id][]     = array();

                $author_services_id                                        = $row->author_services_id;

                $authors_prog[$author_services_id]['authors_progress']     = $author->get_authors_service_progress($author_services_id);


                // Loop for Authors Steps Progress

      			foreach($authors_prog[$author_services_id]['authors_progress'] as $authors_prog_row){

     				$project_progress_steps_id = $authors_prog_row->project_progress_steps_id;

                    $authors_progress[$author_services_id][$project_progress_steps_id]['step_status'] = $authors_prog_row->step_status;

                    $authors_progress[$author_services_id][$project_progress_steps_id]['step_name'] = $authors_prog_row->step_name;
     				
                    $authors_progress[$author_services_id][$project_progress_steps_id]['updated_at'] = $authors_prog_row->updated_at;

                    $authors_progress[$author_services_id][$project_progress_steps_id]['assigned_to_id'] = $authors_prog_row->assigned_to_id;

                    $authors_progress[$author_services_id][$project_progress_steps_id]['assigned_to'] = $authors_prog_row->assigned_to_id;
                    
                    $assigned_to = $usermodel->get_user_info($authors_prog_row->assigned_to_id);
                    
                    if(!empty($assigned_to)){

                        $authors_progress[$author_services_id][$project_progress_steps_id]['assigned_to_name'] = $assigned_to->name;

                        $authors_progress[$author_services_id][$project_progress_steps_id]['assigned_to_date'] = $authors_prog_row->assigned_to_date;

                    }


                    $authors_progress[$author_services_id][$project_progress_steps_id]['assigned_by_id']     = $authors_prog_row->assigned_by_id;


                    $assigned_by = $usermodel->get_user_info($authors_prog_row->assigned_by_id);

                    if(!empty($assigned_by)){

                        $authors_progress[$author_services_id][$project_progress_steps_id]['assigned_by_name'] = $assigned_by->name;

                        $authors_progress[$author_services_id][$project_progress_steps_id]['assigned_by_date']   = $authors_prog_row->assigned_by_date;

                        }


     			}
  

     		}

            $request->session()->put('author_progress', $authors_progress);

            if($service_type_id == 7) {

            return view('pages.authors_project_tracker_list_obp', ['author_services_lists'        => $author_services_lists,

                                                                'service_progress_steps'       => $service_progress_steps,

                                                                'service_type_id'              => $service_type_id,

                                                                'users'                        => $users,

                                                                'service_names'                => $serviceNames,

                                                                'user_acct'                    => $user_acct,

                                                                'users_arr'                    => $users_arr,

                                                                'service_types'                => $service_types, 

                                                                'service_types_lists'          => $service_types_lists,

                                                                'service_type_info'            => $service_type_info,

                                                                'dynamic_service_names'        => $dynamic_service_names,

                                                                'bookfair_service_names'       => $bookfair_service_names,

                                                                'booktrailer_service_names'    => $booktrailer_service_names,

                                                                'pressrelease_service_names'   => $pressrelease_service_names,

                                                                'blogging_service_names'       => $blogging_service_names,

                                                                'socialmedia_service_names'    => $socialmedia_service_names,

                                                                'obp_service_names'            => $obp_service_names,

                                                                'bookfairwpr_service_names'    => $bookfairwpr_service_names
                        ]);
            
            }else {

            return view('pages.authors_project_tracker_lists', ['author_services_lists'        => $author_services_lists,

                                                                'service_progress_steps'       => $service_progress_steps,

                                                                'service_type_id'              => $service_type_id,

                                                                'users'                        => $users,

                                                                'service_names'                => $serviceNames,

                                                                'user_acct'                    => $user_acct,

                                                                'users_arr'                    => $users_arr,

                                                                'service_types'                => $service_types, 

                                                                'service_types_lists'          => $service_types_lists,

                                                                'service_type_info'            => $service_type_info,

                                                                'dynamic_service_names'        => $dynamic_service_names,

                                                                'bookfair_service_names'       => $bookfair_service_names,

                                                                'booktrailer_service_names'    => $booktrailer_service_names,

                                                                'pressrelease_service_names'   => $pressrelease_service_names,

                                                                'blogging_service_names'       => $blogging_service_names,

                                                                'socialmedia_service_names'    => $socialmedia_service_names,

                                                                'obp_service_names'            => $obp_service_names,

                                                                'bookfairwpr_service_names'    => $bookfairwpr_service_names
                        ]);
        }

     }     

    public function view_service($service_type_id){


        $progress                = new Progress;

        $service                 = new Service;

        $service_progress_steps  = $progress->get_service_progress_steps($service_type_id);

        $service_info            = $service->get_service_type_info($service_type_id);

        $service_types           = $service->get_servicenames_by_servicetypeid($service_type_id);


        return view('pages.view_service', [    

                                                'service_progress_steps'    => $service_progress_steps,
                                                'service_info'              => $service_info,
                                                'service_types'             => $service_types

                                            ]);


    }


    public function view_author_service($author_service_id, $author_id){

            $progress                   = new Progress;

            $author                     = new Author;

            $usermodel                  = new UserModel;

            $service                    = new Service;

            $role                       = new Role;

            $user_acct                  = Auth::user();
            
            $user_role                  = $role->get_role_info($user_acct->role_by_id);

            $serviceNames               = $service->get_servicenames_by_servicetypeid(1);
            
            $users                      = $usermodel->get_all_users();

            $author_service_prog        = $author->get_authors_service_progress($author_service_id);

            $author_service_info        = $author->get_author_service_info($author_service_id);

            $service_type_id            = $author_service_info->service_type_id;

            $service_progress_steps     = $progress->get_service_progress_steps($service_type_id);

            $authors_progress           = array();


            foreach($author_service_prog as $authors_prog_row){

                    $project_progress_steps_id  = $authors_prog_row->project_progress_steps_id;

                    $authors_progress[$project_progress_steps_id]['assigned_to_name'] = "";
                    $authors_progress[$project_progress_steps_id]['assigned_by_name'] = "";
                    $authors_progress[$project_progress_steps_id]['step_status']      = "";

                    $authors_progress[$project_progress_steps_id]['step_status']     = $authors_prog_row->step_status;

                    $authors_progress[$project_progress_steps_id]['step_name']       = $authors_prog_row->step_name;

                    $authors_progress[$project_progress_steps_id]['on_queue_date']   = $authors_prog_row->on_queue_date;

                    $authors_progress[$project_progress_steps_id]['completed_date']  = $authors_prog_row->completed_date;

                    $authors_progress[$project_progress_steps_id]['stop_prod_date']  = $authors_prog_row->on_queue_date;

                    $authors_progress[$project_progress_steps_id]['on_hold_date']    = $authors_prog_row->on_queue_date;
                
                    $authors_progress[$project_progress_steps_id]['updated_at']      = $authors_prog_row->updated_at;

                    $authors_progress[$project_progress_steps_id]['assigned_to_id']  = $authors_prog_row->assigned_to_id;

                    $authors_progress[$project_progress_steps_id]['assigned_to']     = $authors_prog_row->assigned_to_id;
                    
                    $assigned_to = $usermodel->get_user_info($authors_prog_row->assigned_to_id);
                    
                    if(!empty($assigned_to)){

                        $authors_progress[$project_progress_steps_id]['assigned_to_name'] = $assigned_to->name;

                        $authors_progress[$project_progress_steps_id]['assigned_to_date'] = $authors_prog_row->assigned_to_date;

                    }


                    $authors_progress[$author_id][$project_progress_steps_id]['assigned_by_id']     = $authors_prog_row->assigned_by_id;


                    $assigned_by = $usermodel->get_user_info($authors_prog_row->assigned_by_id);

                    if(!empty($assigned_by)){

                        $authors_progress[$project_progress_steps_id]['assigned_by_name']   = $assigned_by->name;

                        $authors_progress[$project_progress_steps_id]['assigned_by_date']   = $authors_prog_row->assigned_by_date;

                        }

                 }

            return view('pages.view_author_service', [   
                                                 'service_progress_steps'    => $service_progress_steps,
                                                 'author_id'                 => $author_id, 
                                                 'users'                     => $users, 
                                                 'authors_progress'          => $authors_progress,
                                                 'author_service_info'       => $author_service_info,
                                                 'service_names'             => $serviceNames,
                                                 'user_acct'                 => $user_acct,
                                                 'user_role'                 => $user_role

                                                 ]);

     }


     public function authors_book_fair_list(){

            $progress                = new Progress;

            $author                  = new Author;

            $service                 = new Service;


            $progress_steps_cnt     = $progress->get_progress_steps_cnt_by_dynamicwebsite();

            $serviceNames           = $service->get_servicenames_by_servicetypeid(1);

            for($step_no = 1; $step_no <= $progress_steps_cnt; $step_no++)

                $progress_steps[$step_no]   = $progress->get_project_progress_steps_dynamicwebsites_by_stepno($step_no);

  
            $dynamic_websites_author =  $author->get_authors_book_fair_list();

            foreach($dynamic_websites_author as $row){

                $authors_prog[$row->author_id]['authors_progress']              = $author->get_authors_service_progress($row->author_id);


                foreach($authors_prog[$row->author_id]['authors_progress'] as $authors_prog_row){

                    $project_progress_steps_id                                  = $authors_prog_row->project_progress_steps_id;

                    $authors_progress[$row->author_id][$project_progress_steps_id]['status'] = $authors_prog_row->status;
                    
                    $authors_progress[$row->author_id][$project_progress_steps_id]['updated_at'] = $authors_prog_row->updated_at;


                }
  
 
            }

  
            return view('pages.authors_project_tracker_lists', ['progress_steps'            => $progress_steps, 
                                                                'progress_steps_cnt'        => $progress_steps_cnt, 
                                                                'dynamic_websites_author'   => $dynamic_websites_author,
                                                                'authors_progress'          => $authors_progress,
                                                                'service_names'             => $serviceNames ]);
     }     

     public function authors_dynamic_website_lists_expanded(Request $request){

     		$progress 				 = new Progress;

     		$author 				 = new Author;

      		$progress_steps_cnt = $progress->get_progress_steps_cnt_by_dynamicwebsite();

     		for($step_no = 1; $step_no <= $progress_steps_cnt; $step_no++)

	     		$progress_steps[$step_no] 	= $progress->get_project_progress_steps_dynamicwebsites_by_stepno($step_no);


     		// $author->get_authors_service_progress($authors_id);

     		$dynamic_websites_author =  $author->get_authors_dynamic_websites();

     		foreach($dynamic_websites_author as $row){

     			$authors_prog[$row->author_id]['authors_progress']  	= $author->get_authors_service_progress($row->author_id);


     			foreach($authors_prog[$row->author_id]['authors_progress'] as $authors_prog_row){

     				$project_progress_steps_id  								= $authors_prog_row->project_progress_steps_id;

     				$authors_progress[$row->author_id][$project_progress_steps_id]['status']	 = $authors_prog_row->status;

     				$authors_progress[$row->author_id][$project_progress_steps_id]['updated_at'] = $authors_prog_row->updated_at;


     			}
				
				 
	     	 	//* print_r($authors_progress[0]); exit;

     		}
 
  			return view('pages.authors_dynamic_website_lists_expanded', [

                                                                'progress_steps' 	        => $progress_steps, 

  																'progress_steps_cnt' 		=> $progress_steps_cnt, 

  																'dynamic_websites_author' 	=> $dynamic_websites_author,

  																'authors_progress'			=> $authors_progress ]);
  


     }


     public function services_names_lists(Request $request){

             $service                   = new Service;

             $services_names_lists      = $service->get_all_service_names();
             $services_types            = $service->get_all_service_types();


            return view('pages.services_names_lists', ['services_names_lists'           => $services_names_lists, 

                                                        'services_types'                => $services_types ]);

     }

     public function archived_services_names(Request $request){

             $service                   = new Service;

             $services_names_lists      = $service->get_all_archived_service_names();
             $services_types            = $service->get_all_service_types();


            return view('pages.archived_services_names', [          'services_names_lists'           => $services_names_lists, 

                                                                    'services_types'                 => $services_types ]);

     }
 
 
     public function list_authors(Request $request){

     	    $author 			        = new Author;

            $service                    = new Service;

            $service_types              = $service->get_all_service_types();

            $dynamic_service_names      = $service->get_dynamicwebsite_service_names();
            $bookfair_service_names     = $service->get_bookfair_service_names();
            $booktrailer_service_names  = $service->get_booktrailer_service_names();
            $pressrelease_service_names = $service->get_pressrelease_service_names();
            $blogging_service_names     = $service->get_blogging_service_names();
            $socialmedia_service_names  = $service->get_socialmedia_service_names();
            $obp_service_names          = $service->get_obp_service_names();
            $bookfairwpr_service_names  = $service->get_bookfairwpr_service_names();
            $list_authors               = $author->get_all_authors();

            foreach($list_authors as $row) {

                 $authors_list_services[$row->author_id] = $author->get_all_authors_services($row->author_id);

            }

            foreach($service_types as $service_type_row){

                    $service_types_lists[$service_type_row->service_type_id]['services']    =   $service->get_servicenames_by_servicetypeid($service_type_row->service_type_id); 
                    $service_types_lists[$service_type_row->service_type_id]['index']       =   $service_type_row->service_type_id; 
            }

  			return view('pages.list_authors', [ 'list_authors' 			        => $list_authors,

                                                'authors_list_services'         => $authors_list_services,

                                                'service_types'                 => $service_types, 

                                                'service_types_lists'           => $service_types_lists
                                                
                                                ]);


     }


     public function import_authors(Request $request){
  			

  			return view('pages.import_authors');
	}


    public function import_proccess(Request $request){



    }

    public function services_types_lists(Request $request){


     	    $service 		= new Service;

     	    $services_types = $service->get_all_service_types();

     	    $service_id		= $request->service_id;

     	    $service_names 	= $service->get_all_service_names();

     	    $i = 0;

     	    foreach ($service_names as $service_names_row) {
		
				$service_names_array[$service_names_row->service_type_id][$i]['service_names'] = $service_names_row->service_name;

				$service_names_array[$service_names_row->service_type_id][$i]['service_name_id'] = $service_names_row->service_name_id;

				$i++;
	     	}

      	  	return view('pages.services_types_lists', [ 'services_types' 				=> $services_types, 

     	  												'service_names_array' 			=> $service_names_array ] );
     }


     public function update_author_info(Request $request){
         
            $author                     = new Author;

            $author_id                  = $request->author_id;
  
            $fields['author_name']      = $request->author_name;

            $fields['lead_id']          = $request->lead_id;

            $fields['service_name_id']  = $request->service_name_id;

            $fields['sold_date']        = $request->sold_date;

            $fields['payment_terms']    = $request->payment_terms;
 

            $author->update_author_info($author_id, $fields);

            return redirect()->back();
  
     }


     public function update_authors_progress_dynamic_website(Request $request){

     		$progress 				 = new Progress;

            $author                  = new Author;

            $usermodel               = new UserModel;

            $user_id                 = Auth::user()->id;

            $author_services_id      = $request->author_services_id;

            $author_name             = $request->author_name;

            $author_services_name    = $request->author_services_name;

            $author_services_type    = $request->author_services_type;
 
            $service_type_id         = $request->service_type_id;

            $updated_progress_status = $request->status_select;

            $assigned_to             = $request->assigned_to;

            $author_id               = $request->author_id;

			$service_progress_steps  = $progress->get_project_progress_steps_byserviceid($service_type_id);

			$i = 0;

            $request->session()->flash('author_services_id', $author_services_id);

            $request->session()->flash('author_name', $author_name);

            $request->session()->flash('serviceName_notification', $author_services_name);

            $request->session()->flash('serviceType_notification', $author_services_type);

            $author_progress = $request->session()->get('author_progress');
                  
            $steps_updated_cnt = 0;

            $assignments_updated_cnt = 0;
 
     		//* Loops the progress steps of author service list...

     		foreach($service_progress_steps as $service_progstep_row){
 
                // Clear out the array values ...

                // Check if Assigned to field is updated...

                // if(isset($assigned_to[$i]) ||

                //     (!isset($author_progress[$author_services_id][$service_progstep_row->project_progress_steps_id]['assigned_to_id']) && 
                //             $author_progress[$author_services_id][$service_progstep_row->project_progress_steps_id]['assigned_to_id'] != 
                //             $assigned_to[$i])) {
                
                if(isset($author_progress[$author_services_id][$service_progstep_row->project_progress_steps_id]['assigned_to_id']) && 
                            $author_progress[$author_services_id][$service_progstep_row->project_progress_steps_id]['assigned_to_id'] != 
                            $assigned_to[$i]) {


                                    $update_fields['assigned_to_id']                                = $assigned_to[$i];

                                    $update_fields['assigned_by_id']                                = $user_id;

                                    $update_fields['assigned_by_date']                              = date("Y-m-d H:i:s");  

                                    $update_fields['assigned_to_date']                              = date("Y-m-d H:i:s");

                                    //* For Notification ...

                                    $assignments_updated[$assignments_updated_cnt]['assigned_to']   = $assigned_to[$i];

                                    $assignments_updated[$assignments_updated_cnt]['step_name']     = $service_progstep_row->step_name;
                                   
                                    //* End Notification ...

                                    // Put this in function ... 
                                    
                                    //*Get Info of User...

                                    $user_info                              = $usermodel->get_user_info($assigned_to[$i]);

                                    $data['assigned_to_email']              = $user_info->email;

                                    $data['step_name']                      = $service_progstep_row->step_name;

                                    $data['assigned_by']                    = Auth::user()->name;

                                    $data['author_name']                    = $author_name;

                                    $data['author_id']                      = $author_id;

                                    $data['author_services_name']           = $author_services_name;

                                    $data['service_type_id']                = $service_type_id;

                                    $data['author_services_name']           = $author_services_name;

                                    if(!isset( $list_users_to_mail['assigned_to_id'])){
                                    
                                        $list_users_to_mail['assigned_to_id'][0]    = $data;

                                    }
                                    
                                    else {

                                        $assignments_updated_cnt++; 

                                    }


                                    }

                                    if(isset($updated_progress_status[$i])){

                                            $update_fields['step_status']           = $updated_progress_status[$i];

                                            if(!empty($request->complete_all) && $request->complete_all == "true"){

                                                $update_fields['step_status']           = "COMPLETED";

                                            }

                                            if(  $update_fields['step_status'] == "ON QUEUE" ){

                                                 $update_fields['on_queue_date']  = date("Y-m-d H:i:s");  
                                            }

                                            if(  $update_fields['step_status'] == "ON HOLD" ){

                                                 $update_fields['on_hold_date']  = date("Y-m-d H:i:s");    
                                            }

                                            if(  $update_fields['step_status'] == "STOP PRODUCTION" ){

                                                 $update_fields['stop_prod_date']  = date("Y-m-d H:i:s");    
                                            }

                                            if(  $update_fields['step_status'] == "COMPLETED" ){

                                                 $update_fields['completed_date']  = date("Y-m-d H:i:s");    
                                            }
                                     
                                                //* Check if step_status does not exist in db...

                                            $check_progress_status_exist = $progress->is_author_projectProgress_exist($author_services_id, $service_progstep_row->project_progress_steps_id);

                                            if(!$check_progress_status_exist){

                                                     //* Insert step_status in db

                                                    $update_fields['project_progress_steps_id']     = $service_progstep_row->project_progress_steps_id;

                                                    $update_fields['author_services_id']            = $author_services_id;

                                                    $progress->insert_progress_authors($update_fields);
                                                
                                            }else {


                                                //* This condition indicates if the updated step_status is same as in the database (if step name is changed)... 

                                                if(isset($author_progress[$author_services_id][$service_progstep_row->project_progress_steps_id]['step_status']) && $author_progress[$author_services_id][$service_progstep_row->project_progress_steps_id]['step_status'] != $updated_progress_status[$i]){

                                                            $update_fields['updated_by_id']  = $user_id;
                                                            
                                                            $steps_updated[$steps_updated_cnt]['changed_step_status']   = $update_fields['step_status'];

                                                            $steps_updated[$steps_updated_cnt]['step_name']             = $author_progress[$author_services_id][$service_progstep_row->project_progress_steps_id]['step_name'];
                                                            
                                                            $steps_updated_cnt++;

                                                    }


                                                    //* Update status in db
                                 
                                                    $progress->update_progress_authors($author_services_id, $service_progstep_row->project_progress_steps_id, $update_fields);
                                        }
                                    }

                    $i++;

     		}

            

                                        // Mail::send('sendmail.sendmail', ['data' => $data], 

                                        //         function($message) use ($data) {

                                        //         $subject = "New Assignment in Project Tracker!";
                                        //         $message->to($data['assigned_to_email'] , 'Intensity Gamer')->subject($subject);

                                        // });
 

            if(isset($steps_updated))
                $request->session()->flash('steps_updated', $steps_updated);

            if(isset($assignments_updated))
                $request->session()->flash('assignments_updated', $assignments_updated);

			return redirect()->back();
  
	     	 
     }

     public function save_author(Request $request){

     	$author 				      = new Author;

		$author->lead_id 	 	      = $request->lead_id;
		$author->author_name 	      = $request->author_name;
 
     	$author->save();

        $fields['service_type_id']   = $request->service_type;
        $fields['service_name_id']   = $request->service_name_id;
        $fields['author_id']         = $author->id;
        $fields['payment_terms']         = $author->payment_terms;
 
        $author->insert_author_services($fields);

		return redirect('/');

     }

     public function save_author_service(Request $request){

        $author                       = new Author;
  
        $fields['service_type_id']   = $request->service_type;
        $fields['service_name_id']   = $request->service_name_id;
        $fields['author_id']         = $request->author_id;
        $fields['sold_date']         = $request->sold_date;
        $fields['payment_terms']     = $request->payment_terms;
 
        $author->insert_author_services($fields);

        return redirect()->back();

     }
     


     public function save_service_name(Request $request){

        $service                    = new Service;

        $service->service_name      = $request->service_name; 
        $service->service_type_id   = $request->service_type_id; 
        $service->updated_by_id     = Auth::user()->id;
        $service->created_by_id     = Auth::user()->id;

        $service->save();

        return redirect()->back();

     }
 

     public function calendar_project_tracker () {

        $user_acct = Auth::user();

        return view('pages.calendar_project_tracker', ['user_acct' => $user_acct]);

     }

     public function authors_booktrailer_lists(){

     	
     }

     public function authors_pressrelease_lists(){

     	
     }

     public function authors_blogging_lists(){

     	
     }
     public function authors_socialmedia_lists(){

     	
     }

     public function authors_obp_lists(){

     	
     }

     public function authors_bookfairWPR_lists(){

        
     }

     public function dashboard(){


            $usermodel             = new UserModel;

            $user_id               = Auth::user()->id;

            $role_by_id            = Auth::user()->role_by_id;

            $role_code             = Auth::user()->role_code;

            if($role_by_id == 1){
                

                // All Teams Assignments

                $dept_id_fulfillment = 1;

                $fulfillment_assignments      = $usermodel->get_team_assignments_by_dept($dept_id_fulfillment);

                $dept_id_bfs = 2;

                $bfs_assignments              = $usermodel->get_team_assignments_by_dept($dept_id_bfs);

                return view('pages.admin_dashboard', [

                                            'fulfillment_assignments' => $fulfillment_assignments, 

                                            'bfs_assignments'         => $bfs_assignments

                                        ]);

            }
            
            else{ 

                // My Teams Assignments

                // Individual Team Assignments

            $team_assignments      = $usermodel->get_user_team_assignments($role_by_id);

            $own_assignments       = $usermodel->get_user_own_assignments($user_id);


                return view('pages.dashboard', [

                                            'team_assignments' => $team_assignments, 

                                            'own_assignments' => $own_assignments

                                        ]);

            }
     }


     public function send_mail(){

            $data['sample'] = "sadasd";
            $data['sample1'] = "sadasd";


            Mail::send('sendmail.sendmail', $data, function($message) {

                    $subject = "New Assignment in Project Tracker!";

                     $message->to('intensity67@gmail.com', 'Intensity Gamer')->subject($subject);
            });
        
     }


     public function list_accounts(){

        $usermodel  = new UserModel;

        $rolemodel  = new Role;

        $roles      = $rolemodel->get_all_roles();

        $users      = $usermodel->get_all_users();

        return view('pages.accounts_list', ['users' => $users, 'roles' => $roles]);

     }

     public function add_account(){

        $rolemodel  = new Role;

        $roles      = $rolemodel->get_all_roles();

        return view('pages.add_account', ['roles' => $roles]);

     }

    public function save_account(Request $request){

            $user                       = new User;
            
            $user->name         =   $request->name;
            $user->email        =   $request->email;
            $user->password     =   bcrypt($request->password);
            $user->username     =   $request->username;
            $user->role_by_id   =   $request->role;

            $user->save();
    
            return redirect()->back();

    }
        
    public function update_account_info(Request $request){

            $userModel                  = new UserModel;

            $user_id                    = $request->user_id;

            $fields['name']             = $request->name;

            $fields['email']            = $request->email;

            $fields['username']         = $request->username;

            $fields['role_by_id']       = $request->role_by_id;

            if(isset( $request->is_poc ))
                $fields['is_poc']       = "True";
 
            $userModel->update_user_info($user_id, $fields);

            return redirect()->back();
  
     }

    public function change_password(Request $request){

            $userModel                 = new UserModel;

            $user_id                   = $request->user_id;

            $fields['password']        = bcrypt($request->password);

            $userModel->update_user_info($user_id, $fields);

            return redirect()->back();
  
     }

     

}



?>
