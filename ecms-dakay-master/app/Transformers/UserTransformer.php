<?php

namespace App\Transformers;

use App\Transformers\Transformer;

use App\Generators;
use Core\Domain\Entity\User as UserEntity;
use Permission;
use Carbon\Carbon;

class UserTransformer extends Transformer
{
    public function transform(array $user)
    {
        $name = sprintf("%s %s", $user['first_name'], $user['last_name']);
        $contact_number = ($user['contact_number'] == null ? 'N/A' : $user['contact_number']);
        $dob = new Carbon($user['dob']);
        $roles = [];

        foreach ($user['roles'] as $user_role)
            $roles[] = $user_role['name'];


        return [
            'id' => (int) $user['id'],
            'username' => $user['username'],
            'email' => $user['email'],

            'name' => $name,
            'first_name' => $user['first_name'],
            'last_name' => $user['last_name'],
            'contact_number' => $contact_number,
            'gender' => $user['gender'],
            'designation' => $user['designation'],
            'address' => $user['address'],
            'dob' => $user['dob'],
            'year' => $dob->year,
            'month' => $dob->month,
            'day' => $dob->day,

            'last_login' => $user['last_login'],
            'last_login_ip' => $user['last_login_ip'],
            'created_at' => $user['created_at'],

            'roles' => $roles,
            'status' => $user['status'],
            'status_text' => $user['status'],

            'permissions' => $this->reverse_permission($user['permissions']),
        ];
    }

    protected function reverse_permission($user_permissions)
    {
        $permissions = array_pluck((new Permission)->permissions(), 'id');
        $user_permissions = array_keys($user_permissions);

        return array_diff($permissions, $user_permissions);
    }
}
