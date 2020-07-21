<?php

namespace App\Tool;

use Carbon\Carbon;

class OTPResendCounter
{
    protected $action;
    protected $resent_limit = 5;

    public function __construct($user_id, $action)
    {
        if (! in_array($action, ['register', 'withdrawal']))
            throw new \InvalidArgumentException('action should be register or withdrawal');

        $this->action = $action . $user_id;
    }

    public function initialise()
    {
        session([sprintf('otp_%s_count', $this->action) => 1]);
        session([sprintf('otp_%s_date', $this->action) => Carbon::now()]);
    }

    public function increment()
    {
        $count = $this->get_count();

        if ($this->get_date()->diffInHours(Carbon::now()) > 1 && $count != 0)
            $this->initialise();

        $count++;
        session([sprintf('otp_%s_count', $this->action) => $count]);

        session()->save();
    }

    public function has_exceeded()
    {
        if ($this->get_count() >= $this->resent_limit && $this->get_date()->diffInHours(Carbon::now()) <= 1)
            return true;

        return false;
    }

    public function reset()
    {
        session()->forget(sprintf('otp_%s_count', $this->action));
        session()->forget(sprintf('otp_%s_date', $this->action));
    }

    public function get_count()
    {
        return session(sprintf('otp_%s_count', $this->action), 0);
    }

    public function get_date()
    {
        return session(sprintf('otp_%s_date', $this->action), Carbon::now());
    }
}