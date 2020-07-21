<?php

namespace App\Commands\User;

use Auth;
use Sentinel;

class UserLogoutCommand
{
    public function execute()
    {
        Auth::logout();
        Sentinel::logout(null, true);
    }
}
