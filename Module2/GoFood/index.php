<?php

require "vendor/autoload.php";

use Core\App\Action;
use Core\App\Request;
use Core\App\SOS;
use Core\Database\QueryDB;

// session_start();
// session_destroy();
SOS::checkTimeOut(7200);
$databse = new QueryDB();
// die(var_dump(Request::uri()));
Action::direct(Request::uri());
