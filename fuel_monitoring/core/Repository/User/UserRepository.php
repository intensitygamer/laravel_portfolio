<?php

namespace Core\Repository\User;

interface UserRepository
{
    public function get_by_id($user_id);
    public function get_by_username($username);
    public function get_by_credential($username);
    public function touch_login($user_id, array $data);
    public function change_user_status($user_id, $status);
    public function update_user_agent($user_id);
}