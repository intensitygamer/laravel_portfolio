<?php

namespace Core\Repository\User;

interface UserRegisterRepository
{
    public function create_user(array $user, bool $need_activation) : array;
    public function create_user_activation($user_id) : string;
    public function activate_user($email, $activation_code) : bool;
}