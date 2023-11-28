<?php

declare(strict_types=1);

use Aruka\Framework\Http\Kernel;
use Aruka\Framework\Http\Request;

define('BASE_PATH', dirname(__DIR__ ));

require_once BASE_PATH . '/vendor/autoload.php';

$request = Request::createFromGlobals();

// Kernel получает Request, обрабатывает его handel() и возвращает Response
// Дальше Response методом send() возвращает результат в браузер
$kernel = new Kernel();
$response = $kernel->handle($request);
$response->send();
