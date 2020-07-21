<?php

namespace Core\Usecase\User;

use Core\Repository\User\UserSearchRepository;

class UserSearch
{
    protected $repository;

    public function __construct(UserSearchRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle($filters, $page = 1)
    {
        $users = $this->repository->get_users($filters, $page);

        return $users;
    }
}