<?php

namespace Modules\BackOffice\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Common\User\LoginRequest;
use App\Repositories;
use App\Tool;

use App\Commands\User\UserLogoutCommand;

use Core\Entity\UserEntity;
use Core\Usecase\User\UserAuthenticate;
use Core\Exception;

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
        return view('modules.backoffice.auth.login');
    }

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
                [UserEntity::ROLE_SYSADMIN]
            );

            if ($valid_login)
                $response = ['status' => 'success', 'redirect_url' => '/dashboard'];
            else
                $response = ['status' => 'error', 'message' => 'Invalid Username or Password'];
        }
        catch (Exception\UserNotExists $e)
        {
            $valid_login = false;
            $response = ['status' => 'fail', 'message' => 'These credentials do not match our records.'];
        }
        catch (Exception\UserRoleMismatch $e)
        {
            $valid_login = false;
            $response = ['status' => 'fail', 'message' => 'Access denied'];
        }
        catch (NotActivatedException $e)
        {
            $valid_login = false;
            $response = ['status' => 'fail', 'message' => 'Account is not yet active'];
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
}