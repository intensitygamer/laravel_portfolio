<?php

namespace App\Http\Requests\BackOffice\Equipment;

use Illuminate\Foundation\Http\FormRequest;

class EquipmentUpdateRequest extends FormRequest
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
            'equipment_description' => 'required',
            'equipment_make' => 'required',
            'equipment_model' => 'required',
            'for_hauling' => 'required',
            'capacity' => 'required',
        ];
    }
}
