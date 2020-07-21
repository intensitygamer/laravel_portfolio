<?php

namespace App\Http\Requests\BackOffice\User;

use Illuminate\Foundation\Http\FormRequest;

use App\Generators;

class UserUpdateRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return (new \Permission)->can_update_users();
    }

    public function all()
    {
        $inputs = parent::all();

        $contact_number = new Generators\ContactNumber;
        $contact_number->country_code = $this->input('contact_country_code');
        $contact_number->number = $this->input('contact_local_number');

        $inputs['contact_number'] = (string) $contact_number;

        return $inputs;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'username' => 'required|exists:users,username',
            'name' => 'sometimes|required',
            'email' => sprintf('sometimes|required|email|unique:users,email,%s,username', $this->input('username')),
            'password' => 'sometimes|required|confirmed|min:8|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X]).*$/',
            'contact_number' => sprintf('sometimes|required|min:10|unique:users,contact_number,%s,username', $this->input('username')),
        ];

        if ($this->input('bank_id'))
        {
            $bank_account_number_max = 10;

            // what the hell..
            if ($this->input('bank_id') == 1)
                $bank_account_number_max = 10;
            else if ($this->input('bank_id') == 2)
                $bank_account_number_max = 10;
            else if ($this->input('bank_id') == 3)
                $bank_account_number_max = 15;
            else if ($this->input('bank_id') == 4)
                $bank_account_number_max = 13;

            $rules['bank_id'] = 'sometimes|required|exists:banks,id';
            $rules['bank_account_number'] = 'sometimes|required|min:10|max:'.$bank_account_number_max;
            $rules['bank_account_name'] = 'sometimes|required';
        }

        return $rules;
    }
}
