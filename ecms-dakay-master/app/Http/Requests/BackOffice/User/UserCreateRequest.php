<?php

namespace App\Http\Requests\BackOffice\User;

use Illuminate\Foundation\Http\FormRequest;

use App\Generators;
use Core\Domain\Entity\User as UserEntity;

class UserCreateRequest extends FormRequest
{
    public function merge_attributes()
    {
        $this->request->add([
            'permissions' => []
        ]);
    }

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
            'first_name' => 'required',
            'last_name' => 'required',
            'designation' => 'required',
            'email' => 'required|email|unique:users,email,deleted_at',
            'username' => 'required|unique:users',
            'password' => 'required|confirmed|min:8|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X]).*$/',
        ];
    }
}
