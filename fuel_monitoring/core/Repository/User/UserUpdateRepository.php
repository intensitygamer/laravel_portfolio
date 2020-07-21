<?php

namespace Core\Repository\User;

interface UserUpdateRepository
{
    public function update_user($username, array $data);
}
