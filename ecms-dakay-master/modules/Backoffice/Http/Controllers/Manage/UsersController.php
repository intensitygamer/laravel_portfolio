<?php

namespace Modules\BackOffice\Http\Controllers\Manage;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Foundation\Validation\ValidatesRequests;

use App\Http\Requests\BackOffice\User\UserCreateRequest;

use App\Models\User;
use App\Helpers\InputHelper;

use App\Commands\User\UserUpdateCommand;
use App\Commands\User\UserDetailCommand;
use App\Commands\User\UserSearchCommand;
use App\Commands\User\UserCreatorCommand;
use App\Commands\User\UserStatusCommand;


use Core\Exception;

class UsersController extends Controller
{
    use RegistersUsers, ValidatesRequests;

    public function index(Request $request)
    {
        if (! (new \Permission)->can_manage_users_list())
            return view('errors.404');

        $users = new UserSearchCommand($request);
        $request->flash();

        return view('modules.backoffice.manage.users.users', [
            'users' => $users->execute(),
        ]);
    }

    public function create(Request $request)
    {
        if (! (new \Permission)->can_manage_users_create())
            return view('errors.404');

        return view('modules.backoffice.manage.users.user_create');
    }

    public function store(UserCreateRequest $request)
    {
        if (! (new \Permission)->can_manage_users_create())
            return view('errors.404');

        $request->merge_attributes();

        (new UserCreatorCommand($request))->execute();

        $request->session()->flash('success', 'User successfully created!');

        return redirect('manage/users');
    }

    public function edit($username, Request $request)
    {
        if (! (new \Permission)->can_manage_users_update())
            return view('errors.404');

        try
        {
            $command = new UserDetailCommand($username);

            $user = $command->execute();

            $model = new User;
            $model->fill($user);
            $model->status = $user['status'];

            $view_data = [
                'model' => $model,
                'roles' => InputHelper::user_roles(),
                'user_status' => InputHelper::user_status(),
                'permissions' => $user['permissions'],
                'current_role' => $user['roles'][0]
            ];

            return view('modules.backoffice.manage.users.user_edit', $view_data);
        }
        catch (Exception\ValidationException $e)
        {
            $this->throwValidationException(
                $request,
                $e->validator()
            );
        }
        catch (Exception\UserNotExists $e)
        {
            return view('errors.404');
        }
    }

    public function update($username, Request $request)
    {
        if (! (new \Permission)->can_manage_users_update())
            return view('errors.404');

        try
        {
            $command = new UserUpdateCommand($username, $request);
            $command->execute();

            $request->session()->flash('success', 'User successfully updated');
            return redirect()->back();
        }
        catch (Exception\Validation $e)
        {
             $this->throwValidationException(
                $request,
                $e->validator()
            );
        }
        catch (Exception\UserNotExists $e)
        {
            return view('errors.404');
        }
    }

    public function update_status($username, Request $request)
    {
        if (! (new \Permission)->can_manage_users_update())
            return view('errors.404');

        try
        {
            $command = new UserStatusCommand($username, $request->get('status'));
            $command->execute();

            $request->session()->flash('success', trans('messages.user status updated'));
            return redirect()->back();
        }
        catch (Exception\Validation $e)
        {
             $this->throwValidationException(
                $request,
                $e->validator()
            );
        }
        catch (Exception\UserNotExists $e)
        {
            return view('errors.404');
        }
    }
}
