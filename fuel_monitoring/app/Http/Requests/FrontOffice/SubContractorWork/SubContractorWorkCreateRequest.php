<?php

namespace App\Http\Requests\FrontOffice\SubContractorWork;

use Illuminate\Foundation\Http\FormRequest;

class SubContractorWorkCreateRequest extends FormRequest
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
        return [
            'transaction_no' => 'required',
            'transaction_date' => 'required',
            'subcontractor' => 'required',
            'equipment' => 'required',

            'project' => 'required',
            'scope_of_work' => 'min:10',
            'project_start_date' => '',
            'contract_amount' => 'required|numeric|not_in:0',

            'total_current_paid_amount' => 'required|numeric|not_in:0'
        ];
    }
}
