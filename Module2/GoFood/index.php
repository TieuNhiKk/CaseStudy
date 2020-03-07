<?php

require "vendor/autoload.php";

use Core\App\Action;
use Core\App\Request;
use Core\App\SOS;
use Core\Database\QueryDB;

SOS::checkTimeOut(7200);
$databse = new QueryDB();
Action::direct(Request::uri());
