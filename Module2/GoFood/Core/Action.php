<?php

namespace Core\App;

use Controller\HomePage;

class Action
{
    protected static $uri;
    protected static $method;

    public static function direct($request)
    {
        // $control = "Controller\\" . $request[0];
        $home = new HomePage();

        foreach ($request as $uri) {
            if (method_exists($home, $uri)) {
                return $home->$uri();
            }
        }

        return HomePage::home();
    }
}
