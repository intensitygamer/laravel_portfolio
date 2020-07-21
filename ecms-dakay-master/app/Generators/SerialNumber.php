<?php

namespace App\Generators;

use Core\Domain\Contract\GeneratorContract;

class SerialNumber extends TransactionCode
{
    public function generate()
    {
        return str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);
    }
}