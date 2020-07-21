<?php

namespace App\Tool;

use Mail;
use Core\Domain\Contract\EmailerContract;

class Emailer implements EmailerContract
{
    protected $mailable;

    public function __construct($mailable)
    {
        $this->mailable = $mailable;
        $this->mailable->from ('noreply@dakayconstruction.com');
    }

    public function to($address, $name = null)
    {
        $this->mailable->to($address, $name);
    }

    public function from($address, $name = null)
    {
        $this->mailable->from($address, $name = null);
    }

    public function subject($subject)
    {
        $this->mailable->subject = $subject;
    }

    public function data(array $data)
    {
        $this->mailable->data = $data;
    }

    public function send()
    {
        Mail::send($this->mailable);
        $this->mailable->to = [];
    }

    public function queue()
    {
        $message = ($this->mailable)->onQueue('emails');

        Mail::queue($message);
        $this->mailable->to = [];
    }
}
