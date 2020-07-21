<?php

namespace App\Http\Requests\BackOffice\Location;

use Illuminate\Foundation\Http\FormRequest;

class LocationCreateRequest extends FormRequest
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
            'name' => 'required|unique:locations',
            'address' => 'required',
            'phone_no' => 'required',
            'contact_person' => 'required',
            'location_date' => 'required'
        ];
    }
}
