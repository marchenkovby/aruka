<?php

//declare(strict_types=1);

// Файл с маршрутами

use App\Controllers\HomeController;
use App\Controllers\PostController;
use Aruka\Framework\Routing\Route;

return [
    // (Метод, Маршрут,[Путь до класса контроллера, Метод контроллера])
    Route::get('/', [HomeController::class, 'index']),
    Route::get('/posts/{id:\d+}', [PostController::class, 'show']),
    Route::get('/hi/{name}', function ($name) {
        return new \Aruka\Framework\Http\Response("Hello, $name");
    }),
];
