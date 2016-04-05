<?php

namespace rave\lib\core\io;

class In
{
    public static function get($get, $filter = FILTER_SANITIZE_FULL_SPECIAL_CHARS)
    {
        return filter_input(INPUT_GET, $get, $filter, FILTER_NULL_ON_FAILURE);
    }

    public static function post($post, $filter = FILTER_SANITIZE_FULL_SPECIAL_CHARS)
    {
        return filter_input(INPUT_POST, $post, $filter, FILTER_NULL_ON_FAILURE);
    }

    public static function cookie($cookie)
    {
        return filter_input(INPUT_COOKIE, $cookie, FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_NULL_ON_FAILURE);
    }

    public static function session($session)
    {
        return isset($_SESSION[$session]) ? $_SESSION[$session] : null;
    }

    public static function uSession($session)
    {
        return isset($_SESSION[$session]) ? unserialize($_SESSION[$session]) : null;
    }

    public static function isSetPost(array $post)
    {
        foreach ($post as $data)
        {
            if (!isset($_POST[$data])) {
                return false;
            }
        }

        return true;
    }

    public static function isSetSession(array $session)
    {
        foreach ($session as $data)
        {
            if (!isset($_SESSION[$data])) {
                return false;
            }
        }

        return true;
    }

}
