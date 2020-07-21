<?php

namespace Modules\FrontOffice\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


use App\Http\Controllers\Controller;
use App\Http\Requests\Common\User\LoginRequest;
use App\Repositories;
use App\Tool;

use App\Commands\User\UserRegisterCommand;
use App\Commands\User\UserLogoutCommand;

use Core\Entity\UserEntity;
use Core\Usecase\User\UserAuthenticate;
use Core\Exception;
use Cartalyst\Sentinel\Checkpoints\NotActivatedException;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function showLoginForm()
    {
        return view('modules.frontoffice.auth.login');
    }

    /**
     * @todo change response format.
     */
    public function login(LoginRequest $request)
    {
        $response = [];

        $usecase = new UserAuthenticate(
            new Repositories\User\UserRepository,
            new Tool\Authenticator
        );

        try
        {
            $valid_login = $usecase->handle(
                $request->get('username', null),
                $request->get('password', null),
                [UserEntity::ROLE_GODLIKE, UserEntity::ROLE_MONITORING_CLERK, UserEntity::ROLE_SUB_CON_CLERK, UserEntity::ROLE_GUEST, UserEntity::ROLE_SYSADMIN]
            );

            if ($valid_login)
                $response = ['status' => 'success', 'redirect_url' => '/dashboard'];
            else
                $response = ['status' => 'error', 'message' => 'Invalid username or password'];
        }
        catch (Exception\UserNotExists $e)
        {
            $valid_login = false;
            $response = ['status' => 'fail', 'message' => 'Account does not exists'];
        }
        catch (Exception\UserSuspended $e)
        {
            $valid_login = false;
            $response = ['status' => 'fail', 'message' => 'Account is suspended or closed, please contact support.'];
        }
        catch (Exception\UserRoleMismatch $e)
        {
            $valid_login = false;
            $response = ['status' => 'fail', 'message' => 'Access Denied'];
        }
        catch (NotActivatedException $e)
        {
            $valid_login = false;
            $response = ['status' => 'fail', 'message' => 'Account is not yet activated. Check your email or contact administrator'];
        }

        return response()->json($response, ($valid_login ? 200 : 400));
    }

    public function logout(Request $request)
    {
        $command = new UserLogoutCommand($request);
        $command->execute();

        return redirect('/login')
                ->withInfo('You are logged out successfully!');
    }

    protected function username()
    {
        return 'username';
    }

    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'required', 'password' => 'required'
        ]);
    }
}
