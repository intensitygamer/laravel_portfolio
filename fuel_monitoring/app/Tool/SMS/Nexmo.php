<?php

namespace App\Tool\SMS;

use Core\Domain\Contract\OTPVerificationContract;

use Nexmo\Client;
use Nexmo\Client\Credentials;
use Nexmo\Verify\Verification;

class Nexmo implements OTPVerificationContract
{
    protected $client;

    public function __construct()
    {
        $key = env('NEXMO_KEY');
        $secret = env('NEXMO_SECRET');

        $this->client = new Client(new Credentials\Basic($key, $secret));
    }

    public function send_verification($number)
    {
        $verification = new Verification($number, config('app.name'));
        $this->client->verify()->start($verification);

        return $verification->getRequestId();
    }

    public function verify($request_id, $code)
    {
        $verification = new Verification($request_id);

        return $this->client->verify()->check($verification, $code);
    }

    public function cancel($request_id)
    {
        $verification = new Verification($request_id);
        $this->client->verify()->cancel($verification);
    }
}