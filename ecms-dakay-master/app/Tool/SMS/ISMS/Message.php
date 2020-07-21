<?php

namespace App\Tool\SMS\ISMS;

class Message
{
    /**
     * ASCII (English, Bahasa Melayu, etc)
     */
    const TYPE_ASCII = 1;

    /**
     * Unicode (Chinese, Japanese, etc)
     */
    const TYPE_UNICODE = 2;

    /**
     * destination number
     */
    protected $number;

    /**
     * the message to send
     */
    protected $message;

    /**
     * message type
     */
    protected $type;

    /**
     * Sender ID to be displayed on recipient's mobile phone. (Please notice that Malaysia Prefix does not support Sender ID)
     */
    protected $send_id;

    public function __construct($number, $message, $type = self::TYPE_UNICODE, $send_id = null)
    {
        $this->number = $number;

        $this->message = $message;

        $this->type = $type;

        $this->send_id = $send_id;
    }

    public function __get($property)
    {
        return $this->{$property};
    }
}
