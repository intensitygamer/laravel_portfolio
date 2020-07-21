<?php

namespace Core\Usecase\User;

use Core\Domain\Contract\OTPVerificationContract;
use Core\Repository\OTPRepository;

/**
 * @deprecated
 */
class UserOTPCancelVerification
{
    protected $otp_repository;
    protected $otp;

    public function __construct(OTPRepository $otp_repository, OTPVerificationContract $otp)
    {
        $this->otp_repository = $otp_repository;
        $this->otp = $otp;
    }

    public function handle($user_id)
    {
        $verification_request_id = $this->otp_repository->get_request_id($user_id);

        $this->otp->cancel($verification_request_id);
    }
}