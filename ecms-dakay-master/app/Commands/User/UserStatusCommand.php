<?php

namespace App\Commands\User;

use Illuminate\Http\Request;

use App\CF;
use App\Repositories\UserRepository;

use Core\Domain\Entity\User as UserEntity;
use Core\Usecase\User\UserStatus;

class UserStatusCommand
{
    private $username;
    private $status;

    public function __construct($username, $status)
    {
        $this->username = $username;
        $this->status = $status;
    }

    public function execute()
    {
        $usecase = new UserStatus(
            new UserRepository,
            new CF\Connector
        );

        $usecase->handle($this->username, $this->status);
    }
}
