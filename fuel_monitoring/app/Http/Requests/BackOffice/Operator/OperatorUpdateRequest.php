<?php

namespace App\Http\Requests\BackOffice\Operator;

use Illuminate\Foundation\Http\FormRequest;

class OperatorUpdateRequest extends FormRequest
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
            'alias' => 'required',
            'license_no' => 'required',
            'driver_code' => 'required',

            'phone_no' => 'required',
            'address' => 'required',
            'operator_date' => 'required',
        ];
    }
}
