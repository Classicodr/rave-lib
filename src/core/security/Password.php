<?php

namespace rave\lib\core\security;


class Password
{
    const COST = 12;

    public static function hash($data)
    {
        return password_hash($data, PASSWORD_BCRYPT, ['cost' => self::COST]);
    }

    public static function verify($password, $hash)
    {
        return password_verify($password, $hash);
    }
}