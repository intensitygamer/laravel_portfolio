<?php

namespace Core\Usecase\User;

use Core\Repository\User\UserPasswordRepository;
use Core\Domain\Contract;
use Core\Validator;
use Core\Exception;

class UserPasswordReset
{
    protected $repository;
    protected $emailer;

    public function __construct(UserPasswordRepository $repository, Contract\EmailerContract $emailer)
    {
        $this->repository = $repository;
        $this->emailer = $emailer;
    }

    public function handle($email)
    {
        $this->validate($email);

        $user = $this->repository->find_user($email);

        $reminder_code = $this->repository->create_password_reminder($user);

        $this->send_reminder_email([
            'name' => ucwords($user->first_name),
            'email' => $user->email,
            'token' => $reminder_code
        ]);
    }

    protected function validate($email)
    {
        $inputs = [
            'email' => $email,
        ];

        $validator = new Validator;

        $validator->setup($inputs);
        $validator->add_rule('email', ['required', 'email', 'exists:users']);

        if (! $validator->is_valid())
            throw new Exception\Validation($validator);
    }

    protected function send_reminder_email($data)
    {
        $this->emailer->to($data['email'], $data['name']);
        $this->emailer->data($data);
        $this->emailer->send();
    }
}