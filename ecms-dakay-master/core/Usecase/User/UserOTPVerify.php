<?php

namespace Core\Usecase\User;

use Core\Domain\Entity\User as UserEntity;
use Core\Domain\Contract\OTPVerificationContract;
use Core\Repository\UserRepository;
use Core\Repository\OTPRepository;
use Core\Exception;

class UserOTPVerify
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

    public function handle($user_id, $code, $action)
    {
        $user = $this->repository->get_by_id($user_id);

        $contact_number = preg_replace('/[^0-9]/', '', $user['contact_number']);

        if ($this->otp_repository->is_expired($contact_number, $code))
            throw new Exception\OTPExpiredException('OTP Code expired');

        $verified = $this->otp_repository->mark_verified($contact_number, $code);

        if (! $verified)
            throw new Exception\OTPFailedException('Unable to validate OTP code');

        if ($user['status'] == UserEntity::STATUS_UNVERIFIED)
            $this->otp_repository->mark_user_verified($user_id);

        return $verified;
    }

    /**
     * @todo
     */
    protected function validate()
    {

    }
}
