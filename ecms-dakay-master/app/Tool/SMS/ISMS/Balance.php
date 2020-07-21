<?php

namespace App\Tool\SMS\ISMS;

use Illuminate\Support\Facades\Redis;
use Carbon\Carbon;

class Balance
{
    protected $balance;
    protected $date;

    public function fetch()
    {
        $ch = curl_init($this->build_url());

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

        $http_result = curl_exec($ch);

        $this->balance = $http_result;
        $this->date = Carbon::now()->toDateTimeString();

        return $this;
    }

    public function cache()
    {
        Redis::set('dewaayam_sms', json_encode(['balance' => $this->balance, 'date' => $this->date]));
    }

    public function from_cache()
    {
        $balance = Redis::get('dewaayam_sms');

        if ($balance)
            return json_decode($balance, true);

        return $balance;
    }

    public function balance()
    {
        return $this->balance;
    }

    public function date()
    {
        return $this->date;
    }

    protected function build_url()
    {
        $url = 'https://www.isms.com.my/isms_balance.php?';

        $params = [
            'un' => urlencode(config('isms.username')),
            'pwd' => urlencode(config('isms.password')),
        ];

        return $url . http_build_query($params);
    }
}
