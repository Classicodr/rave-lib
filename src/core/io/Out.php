<?php

namespace rave\lib\core\io;

class Out
{

    public static function session($name, $value)
    {
        $_SESSION[$name] = $value;
    }

    public static function sSession($name, $value)
    {
        $_SESSION[$name] = serialize($value);
    }

    public static function sessionDestroy()
    {
        session_unset();
        session_destroy();
    }

    public static function unsetSession($name)
    {
        if (isset($_SESSION[$name])) {
            unset($_SESSION[$name]);
        }
    }

    public static function cookie($name, $value, $expire = 0)
    {
        setcookie($name, $value, $expire === 0 ? $expire : time() + $expire, null, null, false, true);
    }

    public static function unsetCookie($name)
    {
        setcookie($name, null, 0, null, null, false, false);
    }

}
