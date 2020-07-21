<?php

namespace Core\Domain\Contract;

interface EmailerContract
{
    public function to($address, $name = null);
    public function from($address, $name = null);
    public function subject($subject);
    public function data(array $data);
    public function send();
    public function queue();
}