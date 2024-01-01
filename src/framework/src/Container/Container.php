<?php

namespace Aruka\Framework\Container;

use Aruka\Framework\Container\Exceptions\ContainerException;
use Psr\Container\ContainerInterface;

class Container implements ContainerInterface
{
    private array $services = [];

    public function add(string $id, string|object $concrete = null)
    {
        if (is_null($concrete)) {
            // Если $id не является классом
            if (!class_exists($id)) {
                throw new ContainerException("Service $id not found");
            }
            $concrete = $id;
        }
        $this->services[$id] = $concrete;
    }

    public function get(string $id)
    {
        return new $this->services[$id];
    }

    public function has(string $id): bool
    {
        // Можно было использовать isset
        // return isset($this->service[$id]
        return array_key_exists($id, $this->services);
    }
}
