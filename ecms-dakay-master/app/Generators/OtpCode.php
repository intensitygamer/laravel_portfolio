<?php

namespace App\Generators;

use Core\Domain\Contract\GeneratorContract;

class OtpCode implements GeneratorContract
{
    public function generate()
    {
        return strtoupper(substr(hash('sha256', strtotime('now')), 0, 5));
    }
}