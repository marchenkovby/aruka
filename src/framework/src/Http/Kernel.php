<?php

declare(strict_types=1);

namespace Aruka\Framework\Http;

use Aruka\Framework\Routing\RouterInterface;
use FastRoute\RouteCollector;

use function FastRoute\simpleDispatcher;

class Kernel
{
    public function __construct(
        private RouterInterface $router
    )
    {
    }

    // Обрабывает запрос и возвращает ответ
    public function handle(Request $request)
    {
        try {
            [$routerHandler, $vars] = $this->router->dispatch($request);

            // Вызывает callback-функция с массивом параметров
            $response = call_user_func_array($routerHandler, $vars);

        } catch (\Throwable $exception) {
            $response = new Response($exception->getMessage(), 500);
        }

        return $response;
    }
}
