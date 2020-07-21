<?php

namespace App\Repositories\User;

use Illuminate\Http\Request;
use Sentinel;
use App\Models\User as UserModel;

use Core\Domain\Entity\User as UserEntity;
use Core\Repository;
use Core\Exception;

class UserRepository implements Repository\User\UserRepository
{
    public function get_by_id($user_id)
    {
        $user = UserModel::with(['roles'])->find($user_id);

        if ($user)
            return $user->toArray();
    }

    public function get_by_username($username)
    {
        $user = UserModel::with(['roles'])
            ->where('username', '=', $username)
            ->first();

        if ($user)
            return $user->toArray();
    }

    public function get_by_credential($username)
    {
        $user = Sentinel::findByCredentials([
            'login' => $username,
        ]);

        if ($user)
        {
            // @todo refactor
            $roles = array_pluck($user->getRoles()->toArray(), 'slug');
            $user = $user->toArray();

            $user['roles'] =  $roles;
        }

        return $user;
    }

    public function touch_login($user_id, array $data)
    {
        UserModel::where('id', $user_id)
            ->update(['last_login_ip' => $data['ip']]);
    }

    public function change_user_status($user_id, $status)
    {
        $user = UserModel::find($user_id);

        $user->status = $status;

        if ($status == UserEntity::STATUS_UNVERIFIED)
        {
            $user->is_otp_verified = false;
        }
        else if ($status == UserEntity::STATUS_ACTIVE)
        {
            $user->is_otp_verified = true;
        }

        $user->save();
    }

    public function update_user_agent($user_id)
    {
        $user = UserModel::find($user_id);

        $user->login_agent = request()->header('User-Agent');

        $user->save();
    }
}
