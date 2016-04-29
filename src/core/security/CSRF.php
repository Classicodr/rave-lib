<?php

namespace rave\lib\core\security;


class CSRF
{
    public static function getToken()
    {
        return hash('sha512', Random::bytes(16), false);
    }
}

