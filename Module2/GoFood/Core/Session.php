<?php

namespace Core\App;

class SOS
{
    public static function checkTimeOut($inactive = 7200)
    {
        ini_set('session.gc_maxlifetime', $inactive);
        session_start();

        if (isset($_SESSION['testing']) && (time() - $_SESSION['testing'] > $inactive)) {
            session_unset();
            session_destroy();
        }

        $_SESSION['testing'] = time();
    }
}
