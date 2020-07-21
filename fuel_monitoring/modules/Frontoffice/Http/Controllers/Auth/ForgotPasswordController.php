<?php

namespace Modules\FrontOffice\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

use App\Http\Controllers\Controller;
use App\Commands\User\UserPasswordResetCommand;

use Core\Exception;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showLinkRequestForm()
    {
        return view('dewaayam.front_office.auth.passwords.email');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $this->validate($request, ['email' => 'required|email']);

        try
        {
            $command = new UserPasswordResetCommand($request->get('email', null));
            $command->execute();

            $request->session()->flash('success', trans('messages.reset link was sent to your email address, please check.'));

            return redirect('/');
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
