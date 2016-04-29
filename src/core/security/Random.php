<?php

namespace rave\lib\core\security;

class Random
{
    public static function sha1(){
        return hash('sha1', self::bytes(16), false);
    }

    public static function bytes($length)
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
