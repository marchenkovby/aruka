<?php

declare(strict_types=1);

namespace Aruka\Framework\Routing;

class Route
{
    public static function get(string $uri, array $handler): array
    {
        return ['GET', $uri, $handler];
    }

    public static function post(string $uri, array $handler): array
    {
        return ['post', $uri, $handler];
    }
}
