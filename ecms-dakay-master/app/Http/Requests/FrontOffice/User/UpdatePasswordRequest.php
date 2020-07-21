<?php

namespace App\Http\Requests\FrontOffice\User;

use Illuminate\Foundation\Http\FormRequest;

use App\Generators;

class UpdatePasswordRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'old_password' => 'sometimes|required',
            'password' => 'sometimes|required|confirmed|min:8|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X]).*$/',
        ];

        return $rules;
    }
}
