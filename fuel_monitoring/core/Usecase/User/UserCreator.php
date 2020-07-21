<?php

namespace Core\Usecase\User;

use Core\Domain\Entity\User as UserEntity;
use Core\Domain\Contract;
use Core\Repository\User\UserRegisterRepository;
use Core\Exception;

class UserCreator
{
    protected $repository;
    protected $validator;
    protected $emailer;

    public function __construct(UserRegisterRepository $repository, Contract\EmailerContract $emailer)
    {
        $this->repository = $repository;
        $this->emailer = $emailer;
    }

    public function handle(UserEntity $entity, bool $need_activation)
    {

        $new_user = $this->repository->create_user($entity->get_properties(), $need_activation);

        if ($need_activation)
        {
            $activation_code = $this->repository->create_user_activation($new_user['id']);

            $this->send_email_verification([
                'name' => $entity->name,
                'email' => $entity->email,
                'username' => $entity->username,
                'password' => $entity->password,
                'activation_code' => $activation_code,
            ]);
        }

        return $new_user;
    }

    protected function send_email_verification($data)
    {
        $this->emailer->to($data['email'], $data['name']);
        $this->emailer->data($data);

        $this->emailer->send();
    }
}
