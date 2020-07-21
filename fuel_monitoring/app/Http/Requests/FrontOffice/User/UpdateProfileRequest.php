<?php

namespace App\Http\Requests\FrontOffice\User;

use Illuminate\Foundation\Http\FormRequest;

use App\Generators;

class UpdateProfileRequest extends FormRequest
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
            'first_name' => 'required',
            'last_name' => 'required',
            'designation' => 'required',
            'email' => sprintf('sometimes|required|email|unique:users,email,%s,username', \Auth::user()->username),
        ];

        return $rules;
    }
}
