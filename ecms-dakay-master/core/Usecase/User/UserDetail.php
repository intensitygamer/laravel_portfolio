<?php

namespace Core\Usecase\User;

use Core\Repository\User\UserRepository;
use Core\Validator;
use Core\Exception;

class UserDetail
{
    protected $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle($username)
    {
        $validator = new Validator;

        $validator->setup([
            'username' => $username
        ]);

        $validator->add_rule('username', ['required']);

        if (! $validator->is_valid())
            throw new Exception\Validation($validator);

        $user = $this->repository->get_by_username($username);

        if (! $user)
            throw new Exception\UserNotExists('User do not exists');

        return $user;
    }
}
