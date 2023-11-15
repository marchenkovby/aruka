<?php

declare(strict_types=1);

namespace Aruka\Framework\Http;

use FastRoute\RouteCollector;

use function FastRoute\simpleDispatcher;

class Kernel
{
    // Обрабывает запрос и возвращает ответ
    public function handle(Request $request): Response
    {
        // Описывает маршруты
        $dispatcher = simpleDispatcher(function (RouteCollector $collector) {

            // Подключает маршруты
            $routes = include BASE_PATH . '/routes/web.php';

            foreach ($routes as $route) {
                // Аналог $collector->addRoute($route[0], $route[1], $route[2]);
                $collector->addRoute(...$route);}
        });

        // Проверяет совпадение URI и метода из запроса
        // с маршрутом и методом из списка объявленных маршрутов
        $routeInfo = $dispatcher->dispatch(
            $request->getMethod(),
            $request->getPath()
        );

        // Получает результат проверки совпадения маршрута:
        // NOT FOUND = 0, FOUND = 1, METHOD NOT ALLOWED = 2
        // $status = $routeInfo[0];
        // Получает 3 элемента массива и сразу заносит их в переменные
        //[$controller, $action] - чтобы отдельно в будущем иметь контроллер и экшин
        [$status, [$controller, $method], $vars] = $routeInfo;

        // Т.к. переменная $controller содержит весь путь
        // App\Controllers\HomeController, благодаря использованию
        // HomeController:class в web.php
        $response = (new $controller())->$method($vars);

        return $response;
    }
}
