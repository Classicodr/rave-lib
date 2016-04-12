<?php

namespace rave\lib\core\security;


class CSRF
{
    public static function getToken()
    {
        return hash('sha512', self::randomBytes(16), false);
    }

    private static function randomBytes($length)
    {
        if (function_exists('random_bytes')) {
            return random_bytes($length);
        }
        if (function_exists('openssl_random_pseudo_bytes')) {
            return openssl_random_pseudo_bytes($length);
        }

        $bytes = '';
        while ($bytes < $length) {
            $bytes .= hash('sha512', uniqid(mt_rand(), true), true);
        }
        return substr($bytes, 0, $length);
    }
}

