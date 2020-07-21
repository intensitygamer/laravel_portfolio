<?php

namespace Core;

interface Authenticator
{
    public function authenticate(array $credentials);
    public function password_check($password) : bool;
}