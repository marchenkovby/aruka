<?php

declare(strict_types=1);

namespace Aruka\Framework\Http;

use FastRoute\RouteCollector;

use function FastRoute\simpleDispatcher;

class Kernel
{
    // Обрабывает запрос и возвращает ответ
    public function handle(Request $request)
    {
        // Функция simpleDispatcher описывает маршруты
        dd($dispatcher = simpleDispatcher(function (RouteCollector $collector) {
            // Подключает маршруты
            $routes = include BASE_PATH.'/routes/web.php';
            foreach ($routes as $route) {
                // Аналог $collector->addRoute($route[0], $route[1], $route[2]);
                $collector->addRoute(...$route);
            }
        }));

        // Проверяет совпадение URI и метода из запроса
        // с маршрутом и методом из описанных маршрутов
        // Возвращает массив из 3-х элементов
        // 1. Получает результат проверки совпадения маршрута:
        // NOT FOUND = 0, FOUND = 1, METHOD NOT ALLOWED = 2
        // 2. Контроллер и метод
        // 3. Параметры (id) из маршрута /user/{id:\d+}
        dd($routeInfo = $dispatcher->dispatch(
            $request->getMethod(),
            $request->getPath()
        ));

        // $status = $routeInfo[0];
        // $handler = $routeInfo[1];
        // $vars = $routeInfo[2];
        [$status, $handler, $var] = $routeInfo;

        // Т.к. переменная $controller содержит весь путь
        // App\Controllers\HomeController, благодаря использованию
        // HomeController:class в web.php
        //$response = (new $controller())->$method($vars);

        //return $response;
    }
}
