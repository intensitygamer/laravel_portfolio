<?php

namespace App\Commands\User;

use Illuminate\Http\Request;
use App\Tool\Authenticator;

class UserPasswordCheckCommand
{
    protected $request;
    protected $authenticator;

    public function __construct(Request $request, Authenticator $authenticator)
    {
        $this->request = $request;
        $this->authenticator = $authenticator;
    }

    public function execute()
    {
        return $this->authenticator->password_check($this->request->get('old_password', null));
    }
}