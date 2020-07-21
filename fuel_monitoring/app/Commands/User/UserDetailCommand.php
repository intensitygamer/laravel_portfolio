<?php

namespace App\Commands\User;

use App\Repositories\User\UserRepository;
use App\Transformers\UserTransformer;
use Core\Usecase\User\UserDetail;

class UserDetailCommand
{
    protected $username;

    public function __construct($username)
    {
        $this->username = $username;
    }

    public function execute()
    {
        $usecase = new UserDetail(new UserRepository);

        $user = $usecase->handle($this->username);

        $transformer = new UserTransformer;

        return $transformer->transform_item($user);
    }
}