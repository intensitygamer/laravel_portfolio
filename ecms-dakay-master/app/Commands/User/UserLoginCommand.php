<?php

namespace App\Commands\User;

use Illuminate\Http\Request;

use Cartalyst\Sentinel\Checkpoints\NotActivatedException;

use App\Repositories;
use App\Tool;

use Core\Usecase\User\UserAuthenticate;
use Core\Validator;
use Core\Exception;

class UserLoginCommand
{
    protected $request;
    protected $credentials;
    protected $role;
    protected $remember;

    public function __construct(Request $request, $role, $remember = false)
    {
        $this->credentials = [
            'username' => $request->get('username', null),
            'password' => $request->get('password', null)
        ];

        $this->request = $request;
        $this->role = $role;
        $this->remember = $remember;
    }

    public function execute()
    {
        // validate captcha if request key is present
        if ($this->request->has('captcha'))
            $this->validate_captcha();

        $usecase = new UserAuthenticate(
            new Repositories\UserRepository,
            new Tool\Authenticator
        );

        return $usecase->handle(
            $this->credentials['username'],
            $this->credentials['password'],
            $this->role
        );
    }

    protected function validate_captcha()
    {
        $validator = new Validator;
        $validator->setup(['captcha' => $this->request->get('captcha', null)]);
        $validator->add_rule('captcha', ['required', 'captcha']);

        if (! $validator->is_valid())
            throw new Exception\Validation($validator);
    }
}
