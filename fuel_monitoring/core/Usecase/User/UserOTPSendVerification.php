<?php

namespace Core\Usecase\User;

use Core\Domain\Contract\OTPVerificationContract;
use Core\Repository\UserRepository;
use Core\Repository\OTPRepository;

class UserOTPSendVerification
{
    protected $repository;
    protected $otp_repository;
    protected $otp;

    public function __construct(UserRepository $repository, OTPRepository $otp_repository, OTPVerificationContract $otp)
    {
        $this->repository = $repository;
        $this->otp_repository = $otp_repository;
        $this->otp = $otp;
    }

    public function handle($user_id, $action)
    {
        $user = $this->repository->get_by_id($user_id);

        $contact_number = preg_replace('/[^0-9]/', '', $user['contact_number']);

        $this->otp_repository->clear_last_verifications($contact_number, $action);

        $verification_code = $this->otp->send_verification($contact_number);

        $this->otp_repository->create_verification($user_id, $contact_number, $verification_code, $action);
    }

    /**
     * @todo
     */
    protected function validate()
    {

    }
}