<?php

namespace App\Tool;

use Illuminate\Http\Request;

use Auth;
use Sentinel;
use App\Repositories;

use Core\Authenticator as CoreAuthenticator;

class Authenticator implements CoreAuthenticator
{
    public function get_authenticated_user()
    {
        return Auth::user();
    }

    public function is_authenticated()
    {
        return Auth::check();
    }

    public function get_username()
    {
        return Auth::user()->username;
    }

    public function get_authenticated_id()
    {
        return (int) Auth::user()->id;
    }

    public function get_ip()
    {
        return app()->make(Request::class)->ip();
    }

    /**
     * @see Core\Authenticator::password_check
     */
    public function password_check($password) : bool
    {
        return (bool) Sentinel::authenticate([
            'username' => $this->get_username(),
            'password' => $password
        ]);
    }

    /**
     * @see Core\Authenticator::authenticate
     */
    public function authenticate(array $credentials)
    {
        $user = Sentinel::authenticate($credentials);

        if ($user)
        {
            Sentinel::login($user);

            Auth::login($user);

            return Auth::check();
        }
    }

    public function is_otp_verified()
    {
        return (bool) Auth::user()->is_otp_verified;
    }

    public function force_login($email)
    {
        $user = (new Repositories\UserPasswordRepository)->find_user($email);

        (new Repositories\UserRepository)->update_user_agent($user['id']);

        Sentinel::login($user);

        Auth::login($user);
    }
}
