<?php

namespace Modules\FrontOffice\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ResetsPasswords;

use App\Http\Controllers\Controller;
use App\Commands\User\UserPasswordConfirmCommand;

use Core\Exception;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showResetForm(Request $request, $token = null)
    {
        return view('dewaayam.front_office.auth.passwords.reset')
            ->with(['token' => $token, 'email' => $request->email]);
    }

    public function reset(Request $request)
    {
        $this->validate($request, $this->rules(), $this->validationErrorMessages());

        try
        {
            $command = new UserPasswordConfirmCommand($request);
            $command->execute();

            return redirect('/login');
        }
        catch (Exception\Validation $e)
        {
            $this->throwValidationException(
                $request,
                $e->validator()
            );
        }
    }
}
