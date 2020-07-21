<?php

namespace App\Commands\User;

use Illuminate\Http\Request;

use App\Repositories\UserRegisterRepository;

use Core\Usecase\User\UserRegistrationActivate;

class UserActivateCommand
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function execute()
    {
        $usecase = new UserRegistrationActivate(
            new UserRegisterRepository
        );

        return $usecase->handle($this->request->get('email', null), $this->request->get('code', null));
    }
}