<?php

namespace App\Commands\User;

use Illuminate\Http\Request;

use Core\Entity\UserEntity;
use Core\Usecase\User\UserPasswordConfirm;
use App\Repositories\UserPasswordRepository;

class UserPasswordConfirmCommand
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->email = $request->get('email', null);
        $this->password = $request->get('password', null);
        $this->password_confirmation = $request->get('password_confirmation', null);
        $this->token = $request->get('token', null);
    }

    public function execute()
    {
        $usecase = new UserPasswordConfirm(new UserPasswordRepository);
        $entity = new UserEntity;

        $entity->email = $this->email;
        $entity->password = $this->password;
        $entity->password_confirmation = $this->password_confirmation;

        return $usecase->handle($entity, $this->token);
    }
}
