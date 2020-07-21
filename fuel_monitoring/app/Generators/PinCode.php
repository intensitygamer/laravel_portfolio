<?php

namespace App\Generators;

use Core\Domain\Contract\GeneratorContract;

class PinCode implements GeneratorContract
{
    public function generate()
    {
        $pin = bin2hex(random_bytes(5));

        return password_hash($pin, PASSWORD_DEFAULT);
    }
}