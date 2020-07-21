<?php

namespace Modules\FrontOffice\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Commands\User\UserActivateCommand;
use App\Commands\User\UserLogoutCommand;
use Core\Exception;
use App\Tool\Authenticator;

class RegistrationActivateController extends Controller
{
    public function activate($code, Request $request, Authenticator $authenticator)
    {
        $request->request->add(['code' => $code]);

        if ($authenticator->is_authenticated())
        {
            $logout = new UserLogoutCommand($request);
            $logout->execute();
        }

        try
        {
            $command = new UserActivateCommand($request);
            $command->execute();

            return redirect('/login')
                ->withInfo('Account has been activated. You can now login using your username and password.');
        }
        catch (Exception\UserActivation $e)
        {
            $request->session()->flash('activation', trans('messages.Unable to activate account'));

            return redirect(route('web.activation_url', ['code' => $code, 'email' => $request->get('email')]));
        }
        catch (Exception\Validation $e)
        {
            $request->session()->flash('activation', $e->get_errors());

            return redirect(route('web.activation_url', ['code' => $code, 'email' => $request->get('email')]));
        }
    }
}