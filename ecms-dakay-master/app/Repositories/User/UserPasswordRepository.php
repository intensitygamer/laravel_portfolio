<?php

namespace App\Repositories\User;

use Sentinel;
use Reminder;

use App\Models\User as UserModel;

use Core\Entity\UserEntity;
use Core\Repository\User;
use Core\Exception;

class UserPasswordRepository implements User\UserPasswordRepository
{
    public function create_password_reminder($user)
    {
        $reminder = Reminder::create($user);

        return $reminder->code;
    }

    public function find_user($email)
    {
        return UserModel::where('email', '=', $email)
            ->first();
    }

    public function complete_reminder($user, $code, $password)
    {
        return Reminder::complete($user, $code, $password);
    }
}