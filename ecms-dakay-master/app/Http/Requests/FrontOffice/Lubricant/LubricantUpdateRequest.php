<?php

namespace App\Http\Requests\FrontOffice\Lubricant;

use Illuminate\Foundation\Http\FormRequest;

class LubricantUpdateRequest extends FormRequest
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
            /*'transaction_no' => 'required',
            'transaction_date' => 'required',
            'type_of_oil_id' => 'required',
            'in' => 'required|numeric',
            'reference_no' => 'required'*/
        ];
    }
}
