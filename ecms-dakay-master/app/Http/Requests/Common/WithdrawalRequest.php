<?php

namespace App\Http\Requests\Common;

use Illuminate\Foundation\Http\FormRequest;

use App\Repositories\SettingsRepository;

class WithdrawalRequest extends FormRequest
{
    public function __construct(SettingsRepository $settings)
    {
        $this->settings = $settings->get_settings();
    }

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
        $deposit_min = $this->settings['player_min_deposit'];
        $deposit_max = $this->settings['player_max_deposit'];

        return [
            'amount' => sprintf('required|numeric|min:%d|max:%d', $deposit_min, $deposit_max),
            'currency' => 'required',
        ];
    }
}
