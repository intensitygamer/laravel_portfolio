<?php

namespace Core\Repository\User;

interface UserSearchRepository
{
    public function get_users(array $filters, $page) : array;
}