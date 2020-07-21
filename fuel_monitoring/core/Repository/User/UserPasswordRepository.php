<?php

namespace Core\Repository\User;

interface UserPasswordRepository
{
    public function create_password_reminder($user);
    public function find_user($email);
    public function complete_reminder($user, $code, $password);
}