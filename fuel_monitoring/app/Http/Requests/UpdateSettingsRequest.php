<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingsRequest extends FormRequest
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
        return [
            'user_verification'     => 'boolean',
            'player_starting_money' => 'required|numeric|digits_between:1,11',
            'player_starting_playmoney' => 'required|numeric|digits_between:1,11',
            'player_max_deposit'    => 'required|numeric|digits_between:1,11',
            'player_min_deposit'    => 'required|numeric|digits_between:1,11',
            'player_max_withdraw'   => 'required|numeric|digits_between:1,11',
            'player_min_withdraw'   => 'required|numeric|digits_between:1,11',
            'commission_percentage' => 'required|numeric|min:0|max:100',
        ];
    }
}
