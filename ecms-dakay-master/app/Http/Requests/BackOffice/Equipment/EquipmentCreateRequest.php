<?php

namespace App\Http\Requests\BackOffice\Equipment;

use Illuminate\Foundation\Http\FormRequest;

class EquipmentCreateRequest extends FormRequest
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
            'equipment_code' => 'required',
            'equipment_date' => 'required',
            'equipment_description' => 'required',
            'equipment_make' => 'required',
            'equipment_model' => 'required',
            'equipment_type' => 'required',
            'capacity' => 'required',
            'for_hauling' => 'required',
            'engine_displacement' => 'required',
            'engine_code' => 'required',
            'engine_no' => 'required',
            'chassis_no' => 'required',
            'body_no' => 'required',
            'color' => 'required',
            'fuel' => 'required',
        ];
    }
}
