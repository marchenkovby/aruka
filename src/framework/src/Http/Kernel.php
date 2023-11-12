<?php

declare(strict_types=1);

namespace Framework\Http;

class Kernel
{
    // Обрабывает запрос и возвращает ответ
    public function handle(Request $request): Response
    {
        // controller -> content

        $content = '<h1>Hello, World!</h1>';

        return new Response($content);
    }
}
