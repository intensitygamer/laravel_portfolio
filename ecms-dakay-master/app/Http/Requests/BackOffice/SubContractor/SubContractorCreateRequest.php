<?php

namespace App\Http\Requests\BackOffice\SubContractor;

use Illuminate\Foundation\Http\FormRequest;

class SubContractorCreateRequest extends FormRequest
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
            'name' => 'required',
            'address' => 'required',
            'contact_1' => 'required',
            'contact_2' => 'required',
            'website' => 'required',
        ];
    }
}
