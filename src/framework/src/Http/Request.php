<?php

declare(strict_types=1);

namespace Framework\Http;

class Request
{
    public function __construct(

        // К свойствам было добавлено readonly,
        // какой смысл если свойство private?

        // Данные из глобального массива $_GET
        private array $getParams,

        // Данные из глобального массива $_POST
        private array $postData,

        // Данные из глобального массива $_COOKIE
        private array $cookies,

        // Данные из глобального массива $_FILES
        private array $files,

        // Данные из глобального массива $_SERVER
        private array $server,
    ) {
    }

    // Получает данные из глобальных массивов PHP:
    // $_GET, $_POST, $_COOKIE, $_FILES, $_SERVER
    public static function createFromGlobals(): static
    {
        // Для чего использовать static, если это только влияет
        // на класс из которого вызывается?
        return new static($_GET, $_POST, $_COOKIE, $_FILES, $_SERVER);
    }
}
