<?php

namespace App\Tool;

use App\Tool;
use App\Repositories;

use Core\Usecase\User\UserOTPSendVerification;
use Core\Usecase\User\UserOTPVerify;

class OTP
{
    protected $authenticator;

    public static function instance()
    {
        return new OTP;
    }

    public function __construct()
    {
        $this->authenticator = new Tool\Authenticator;
    }

    public function send($user_id, $action)
    {
        $usecase = new UserOTPSendVerification(
            new Repositories\UserRepository,
            new Repositories\OTPRepository,
            new Tool\SMS\ISMS\OTP
        );

        return $usecase->handle($user_id, $action);
    }

    public function verify($user_id, $code, $action)
    {
        $usecase = new UserOTPVerify(
            new Repositories\UserRepository,
            new Repositories\OTPRepository,
            new Tool\SMS\ISMS\OTP
        );

        return $usecase->handle($user_id, $code, $action);
    }
}