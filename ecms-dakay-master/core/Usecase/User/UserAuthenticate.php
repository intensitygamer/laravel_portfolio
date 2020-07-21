<?php

namespace Core\Usecase\User;

use Core;
use Core\Domain\Entity\User as UserEntity;
use Core\Repository;
use Core\Validator;
use Core\Exception;

class UserAuthenticate
{
    protected $repository;
    protected $authenticator;

    private $roles;

    public function __construct(Repository\User\UserRepository $repository, Core\Authenticator $authenticator)
    {
        $this->repository = $repository;
        $this->authenticator = $authenticator;

        $this->roles = UserEntity::available_roles();
    }

    public function handle($username, $password, $role = null)
    {
        $user = $this->repository->get_by_credential($username);

        if (! $user)
            throw new Exception\UserNotExists('User do not exists');

        if (! is_null($role) && ! (bool) array_intersect($role, $user['roles']))
            throw new Exception\UserRoleMismatch(sprintf('Unable to authenticate with the give role "%s"', implode(', ', $role)));

        $blocked_status = [UserEntity::STATUS_SUSPENDED, UserEntity::STATUS_CLOSED];

        if (in_array($user['status'], $blocked_status))
            throw new Exception\UserSuspended('User account suspended or closed');

        $authenticated = $this->authenticator->authenticate([
            'username' => $user['username'],
            'password' => $password
        ]);

        $this->repository->update_user_agent($user['id']);

        if ($authenticated)
            $this->repository->touch_login($user['id'], ['ip' => $this->authenticator->get_ip()]);

        return $authenticated;
    }
}
