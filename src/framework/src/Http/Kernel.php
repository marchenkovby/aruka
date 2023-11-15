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
                $collector->addRoute(...$route);
            }

            // Аналог $collector->addRoute('GET',  '/', function () {});
            /*$collector->get('/', function () {
                $content = '<h1>Hello, World!</h1>';

                return new Response($content);
            });

            $collector->get('/posts/{id:\d+}', function (array $vars) {
                $content = "<h1>Post - {$vars['id']}</h1>";

                return new Response($content);
            });*/
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
        [$status, $handler, $vars] = $routeInfo;

        dd($handler);

        // Возвращает неявно объект класса Response
        return $handler($vars);
    }
}
