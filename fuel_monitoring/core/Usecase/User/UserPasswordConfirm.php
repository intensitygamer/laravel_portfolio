<?php

namespace Core\Usecase\User;

use Core\Entity\UserEntity;
use Core\Repository\User\UserPasswordRepository;
use Core\Emailer;
use Core\Validator;
use Core\Exception;

class UserPasswordConfirm
{
    protected $repository;

    public function __construct(UserPasswordRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle(UserEntity $entity, $token)
    {
        $this->validate($entity, $token);

        $user = $this->repository->find_user($entity->email);

        return $this->repository->complete_reminder($user, $token, $entity->password);
    }

    protected function validate(UserEntity $entity, $token)
    {
        $inputs = [
            'email' => $entity->email,
            'password' => $entity->password,
            'password_confirmation' => $entity->password_confirmation,
            'token' => $token
        ];

        $validator = new Validator;

        $validator->setup($inputs);
        $validator->add_rule('email', ['required', 'email', 'exists:users']);
        $validator->add_rule('password', ['required', 'confirmed', 'min:8', 'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X]).*$/']);
        $validator->add_rule('token', ['required']);

        if (! $validator->is_valid())
            throw new Exception\Validation($validator);
    }
}