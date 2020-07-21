<?php

namespace App\Generators;

use Core\Domain\Contract\GeneratorContract;

class AffiliateCode implements GeneratorContract
{
    protected $username;

    public function __construct($username)
    {
        $this->username = $username;
    }

    public function generate()
    {
        $hash = strtoupper(substr(hash('sha256', $this->username), 0, 5));

        return sprintf('AFF-%s-%s', $this->username, $hash);
    }
}