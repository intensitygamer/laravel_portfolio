<?php

namespace Modules\FrontOffice\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;

use App\Helpers\InputHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\FrontOffice\PlayerRegisterRequest;
use App\Commands\User\UserRegisterCommand;

use App\Tool\Authenticator;

use Core\Exception;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm(Request $request)
    {
        return view('dewaayam.front_office.auth.register', [
            'countries' => InputHelper::country_list(),
            'call_codes' => InputHelper::call_codes(),
            'banks' => InputHelper::registration_banks(),
            'ref' => $request->get('ref', null)
        ]);
    }

    public function register(PlayerRegisterRequest $request, Authenticator $authenticator)
    {
        $request->merge_attributes();

        try
        {
            (new UserRegisterCommand($request))->execute();

            $request->session()->flash('activation', trans('messages.Please check your email to activate your account'));

            $authenticator->force_login($request->get('email'));

            return redirect(route('web.register_otp'));
        }
        catch (\Exception $e)
        {
            $request->session()->flash('error', trans('messages.something went wrong please try again'));

            return redirect()->back();
        }
    }
}
