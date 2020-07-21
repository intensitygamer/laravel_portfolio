<?php

namespace Core\Usecase\User;

use Core\Domain\Contract\CFContract;
use Core\Domain\Entity\User as UserEntity;
use Core\Repository\UserRepository;

class UserStatus
{
    protected $repository;
    protected $cf;

    public function __construct(UserRepository $repository, CFContract $cf)
    {
        $this->repository = $repository;
        $this->cf = $cf;
    }

    public function handle($id, $status)
    {
        $user = $this->repository->get_by_username($id);

        if ($status == UserEntity::STATUS_SUSPENDED || $status == UserEntity::STATUS_CLOSED)
            $this->cf->change_user_status($user['member_code'], $status);

        if ($status == UserEntity::STATUS_ACTIVE)
            $this->cf->change_user_status($user['member_code'], 'open');

        $this->repository->change_user_status($user['id'], $status);
    }
}