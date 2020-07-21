<?php

namespace Core\Usecase\User;

use Core\Entity\UserEntity;
use Core\Repository\User\UserRegisterRepository;
use Core\Validator;
use Core\Exception;

class UserRegistrationActivate
{
    protected $repository;

    public function __construct(UserRegisterRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle($email, $activation_code)
    {
        $this->validate($email, $activation_code);

        $activated = $this->repository->activate_user($email, $activation_code);

        if (! $activated)
            throw new Exception\UserActivation(['unable to activate account']);

        return $activated;
    }

    public function validate($email, $code)
    {
        $inputs = [
            'email' => $email,
            'code' => $code
        ];

        $validator = new Validator;

        $validator->setup($inputs);
        $validator->add_rule('email', ['required', 'email']);
        $validator->add_rule('code', ['required']);

        if (! $validator->is_valid())
            throw new Exception\Validation($validator);
    }
}