<?php

namespace Modules\FrontOffice\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;

use App\Http\Requests\FrontOffice\User\UpdateProfileRequest;
use App\Http\Requests\FrontOffice\User\UpdatePasswordRequest;

use App\Tool\Authenticator;
use App\Models\User;

use App\Commands\User\UserUpdateCommand;
use App\Commands\User\UserDetailCommand;
use App\Commands\User\UserPasswordCheckCommand;

use Core\Exception;

class ProfileController extends Controller
{
    use ValidatesRequests;

    public function profile(Authenticator $authenticator)
    {
        try
        {
            $command = new UserDetailCommand($authenticator->get_username());

            $user = $command->execute();

            $model = new User;
            $model->fill($user);

            $view = [
                'current_role' => $user['roles'][0],
                'status' => $user['status_text'],
            ];

            return view('modules.frontoffice.auth.profile', compact('view', 'model'));
        }
        catch (Exception\Validation $e)
        {
            $this->throwValidationException($request, $e->validator());
        }
        catch (Exception\UserNotExists $e)
        {
            return view('errors.404');
        }
    }

    public function change_password(Authenticator $authenticator)
    {
        try
        {
            $command = new UserDetailCommand($authenticator->get_username());

            $user = $command->execute();

            $model = new User;
            $model->fill($user);

            return view('modules.frontoffice.auth.password', compact('model'));
        }
        catch (Exception\Validation $e)
        {
            $this->throwValidationException($request, $e->validator());
        }
        catch (Exception\UserNotExists $e)
        {
            return view('errors.404');
        }
    }

    public function update_profile(UpdateProfileRequest $request, Authenticator $authenticator)
    {
        try
        {
            $command = new UserUpdateCommand($authenticator->get_username(), $request);
            $command->execute();

            $request->session()->flash('success', 'You have updated your profile!');

            return redirect()->back();
        }
        catch (Exception\UserNotExists $e)
        {
            return view('errors.404');
        }
    }

    public function update_password(UpdatePasswordRequest $request, Authenticator $authenticator)
    {
        $command = new UserPasswordCheckCommand($request, $authenticator);

        if (! $command->execute())
        {
            $request->session()->flash('error', 'Ops! Incorrect Old password, Please input again!');
            return redirect()->back();
        }

        try
        {
            $command = new UserUpdateCommand($authenticator->get_username(), $request);
            $command->execute();

            $request->session()->flash('success', 'Congrats! Your password has successfully updated!');
            return redirect()->back();
        }
        catch (Exception\Validation $e)
        {
            $this->throwValidationException($request, $e->validator());
        }
        catch (Exception\UserNotExists $e)
        {
            return view('errors.404');
        }
    }

}
