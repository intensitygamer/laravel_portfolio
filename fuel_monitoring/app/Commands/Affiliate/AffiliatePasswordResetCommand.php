<?php

namespace App\Commands\Affiliate;

use App\Repositories\UserPasswordRepository;
use App\Mail\Affiliate\PasswordReset;
use App\Tool\Emailer;

use Core\Usecase\User\UserPasswordReset;

class AffiliatePasswordResetCommand
{
    protected $email;

    public function __construct($email)
    {
        $this->email = $email;
    }

    public function execute()
    {
        $usecase = new UserPasswordReset(
            new UserPasswordRepository,
            new Emailer(new PasswordReset)
        );

        $usecase->handle($this->email);
    }
}
