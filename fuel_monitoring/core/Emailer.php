<?php

namespace Core;

/**
 * @todo replace with Core\Domain\Contract\EmailerContracts
 */
class Emailer
{
    protected $sender = 'noreply@dewaayam8.app';
    protected $receiver;
    protected $subject;
    protected $body;
    protected $data;

    public function __construct()
    {
    }

    public function receiver($email)
    {
        $this->receiver = $email;
        return $this;
    }

    public function data($data)
    {
        $this->data = $data;
        return $this;
    }

    public function subject($subject)
    {
        $this->subject = $subject;
        return $this;
    }

    public function body($body)
    {
        $this->body = $body;
        return $this;
    }

    public function queue()
    {
        \Mail::queue($this->body, $this->data, $this->callback());
        $this->receiver = null;
    }

    public function send()
    {
        \Mail::send($this->body, $this->data, $this->callback());
        $this->receiver = null;
    }

    public function callback()
    {
        return function($message) {
            $message
                ->from($this->sender)
                ->to($this->receiver)
                ->subject($this->subject);
        };
    }
}