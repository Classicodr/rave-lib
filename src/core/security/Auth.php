<?php

namespace rave\lib\core\security;

class Auth
{

    private static function hash($data)
    {
        return hash('sha256', $data);
    }

    public static function login($name)
    {
        $_SESSION[$name] = self::hash($_SERVER['REMOTE_ADDR']);
    }

    public static function check($name)
    {
        return isset($_SESSION[$name]) && $_SESSION[$name] === self::hash($_SERVER['REMOTE_ADDR']);
    }

}
