<?php

namespace App\Tool\SMS\ISMS;

use App\Generators;
use App\Tool\SMS\ISMS;

use Core\Domain\Contract\OTPVerificationContract;

class OTP implements OTPVerificationContract
{
    public function send_verification($number) : string
    {
        $code = (new Generators\OtpCode)->generate();

        $message = new ISMS\Message($number, sprintf('OTP Code: %s, this code will expire in 5 minutes.', $code));

        $sender = new ISMS\Sender($message);

        $sender->send();

        return $code;
    }

    /**
     * locally verified, no need to implement
     */
    public function verify($request_id, $code) : bool
    {
        return true;
    }
}