<?php

namespace App\Http\Requests\FrontOffice\Fuel;

use Illuminate\Foundation\Http\FormRequest;

class FuelUseRequest extends FormRequest
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
            'transaction_time' => 'required',
            'equipment' => 'required',
            'project' => 'required',
            'operator' => 'required',
            'no_of_hours' => 'required|numeric',
            'millage' => 'required|numeric',
            'out' => 'required|numeric|not_in:0'
        ];
    }
}
