<?php

namespace App\Repositories\User;

use App\Models\User as UserModel;

use Core\Domain\Entity\User as UserEntity;
use Core\Repository\User;

class UserSearchRepository implements User\UserSearchRepository
{
    public function get_users(array $filters, $page) : array
    {
        $user_model = new UserModel;

        $users = $user_model->with(['roles'])->whereHas('roles', function($q) use ($filters) {
            $q->where('role_id', '!=', 1);
        });

        if (isset($filters['q']))
        {
            $users->where(function($q) use ($filters) {
                $q->orWhere('first_name', 'like', '%'. $filters['q'] .'%');
                $q->orWhere('last_name', 'like', '%'. $filters['q'] .'%');
                $q->orWhere('email', 'like', '%'. $filters['q'] .'%');
                $q->orWhere('username', 'like', '%'. $filters['q'] .'%');
            });
        }

        if (isset($filters['role']))
        {
            $users->whereHas('roles', function($q) use ($filters) {
                $q->where('role_id', '=', $filters['role']);
            });
        }

        if (isset($filters['status']))
            $users->where('status', '=', $filters['status']);
        else
            $users->where('status', '!=', UserEntity::STATUS_CLOSED);

        $users->orderBy('id', 'desc');

        $users = $users->paginate(15);

        return $users->toArray();
    }
}
