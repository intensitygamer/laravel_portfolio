<?php

namespace App\Http\Requests\FrontOffice\SubContractorWork;

use Illuminate\Foundation\Http\FormRequest;

class SubContractorWorkUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
        //return (new \Permission)->can_create_users();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        
        $current = array();
        
        if(array_key_exists('amount_to_pay', $this->all())){

             $current = ['amount_to_pay' => 'required|numeric|not_in:0'];

        }

        if(!array_key_exists('current_paid_amount', $this->all()) && !array_key_exists('amount_to_pay', $this->all())){

               $current = [
                    'transaction_date' => 'required',
                    'subcontractor' => 'required',
                    'contract_amount' => 'required',
                    'equipment' => 'required',
                    'project' => 'required',
                    'scope_of_work' => 'min:10',
                    'project_start_date' => '',
                ];


        } 
         
        if(array_key_exists('warranty', $this->all())){
                $current = array_merge($current, array('warranty' => 'required'));
        } 
 
        // else {
        //     //$current = array_merge($current, array('amount_to_pay' => 'required|numeric|not_in:0'));
        // }

        return $current;


    }
}
