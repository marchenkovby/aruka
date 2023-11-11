<?php

// router
// logic
// response

define('BASE_PATH', dirname(__DIR__));

require_once BASE_PATH.'/vendor/autoload.php';

use Framework\Http\Request;

$request = Request::createFromGlobals();

dd($request);
