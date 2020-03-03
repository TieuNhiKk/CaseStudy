<?php

namespace Core\App;

class Request
{
    protected static $router = [];

    public static function uri()
    {
        return explode('/', trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'));
    }

    public static function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }


}
