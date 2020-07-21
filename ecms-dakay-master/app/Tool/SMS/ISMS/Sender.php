<?php

namespace App\Tool\SMS\ISMS;

use App\Tool\SMS\ISMS\Message;

class Sender
{
    protected $message;

    public function __construct(Message $message)
    {
        $this->message = $message;
    }

    public function send()
    {
        $ch = curl_init($this->build_url());

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

        $http_result = curl_exec($ch);

        $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        list($error_code) = explode('=', $http_result);

        if ($error_code != 2000)
            throw new \Exception($http_result);

        curl_close($ch);

        return $http_result;
    }

    protected function build_url()
    {
        $url = 'https://www.isms.com.my/isms_send.php?';

        $params = [
            'un' => urlencode(config('isms.username')),
            'pwd' => urlencode(config('isms.password')),
            'dstno' => urlencode($this->message->number),
            'msg' => html_entity_decode($this->message->message, ENT_QUOTES, 'utf-8'),
            'type' => (int) $this->message->type
        ];

        if ($this->message->send_id)
            $params['send_id'] = $this->message->send_id;

        return $url . http_build_query($params);
    }
}