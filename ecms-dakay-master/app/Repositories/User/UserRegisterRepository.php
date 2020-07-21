<?php

namespace App\Repositories\User;

use Sentinel;
use Activation;
use App\Generators;
use App\Models;

use App\Models\User as UserModel;

use Core\Domain\Entity\User as UserEntity;
use Core\Repository\User;
use Core\Exception;

use Permission;

class UserRegisterRepository implements User\UserRegisterRepository
{
    public function create_user(array $user, bool $need_activation) : array
    {
        $user_roles = $user['roles'];
        $user_permissions = $user['permissions'];

        if ((bool) count($user_permissions))
            $user['permissions'] = $this->inverse_permission($user_permissions);


        if ($need_activation === false)
            $user = Sentinel::registerAndActivate($user);
        else
            $user = Sentinel::register($user);


        if ((bool) count($user_roles))
        {
            foreach ($user_roles as $user_role)
            {
                $role = Sentinel::findRoleBySlug($user_role);
                $role->users()->attach($user);
            }
        }

        return $user->toArray();
    }

    public function create_user_activation($user_id) : string
    {
        $user = Sentinel::findById($user_id);

        $activation = Activation::create($user);

        return $activation['code'];
    }

    public function activate_user($email, $activation_code) : bool
    {
        $user = UserModel::where('email', '=', $email)
            ->get()
            ->first();

        if ($user)
        {
            $sentinel_user = Sentinel::findById($user['id']);

            if (Activation::completed($sentinel_user))
                return false;

            return Activation::complete(
                $sentinel_user,
                $activation_code
            );
        }
    }

    protected function inverse_permission($selected_permissions)
    {
        $permissions = array_pluck((new Permission)->permissions(), 'id');

        $disabled_permissions = [];

        foreach (array_diff($permissions, $selected_permissions) as $permission)
            $disabled_permissions[$permission] = false;

        return $disabled_permissions;
    }
}
