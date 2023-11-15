<?php

//declare(strict_types=1);

// Файл с маршрутами

use App\Controllers\HomeController;
use Aruka\Framework\Routing\Route;

return [
    // [Метод, Маршрут,[Путь до класса контроллера, Метод контроллера]]
    //'/', App\Controllers\HomeController, 'index'
    Route::get('/', [HomeController::class, 'index']),
];
