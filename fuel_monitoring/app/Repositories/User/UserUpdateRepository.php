<?php

namespace App\Repositories\User;

use Core\Repository\User;

use Sentinel;
use Permission;

class UserUpdateRepository implements User\UserUpdateRepository
{
    public function update_user($username, array $data)
    {
        $user = Sentinel::findByCredentials([
            'login' => $username
        ]);

        if ($data['permissions']){
            $data['permissions'] = $this->inverse_permission($data['permissions']);
        }

        if(isset($data['roles']) && $data['roles']){
            //detach current roles
            $user->roles()->detach($user->roles()->get()[0]->id);

            //attach roles
            $role = Sentinel::findRoleBySlug($data['roles']);
            $role->users()->attach($user);
        }

        Sentinel::update($user, $data);
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
