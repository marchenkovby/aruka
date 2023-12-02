<?php

declare(strict_types=1);

namespace App\Controllers;

use Aruka\Framework\Http\Response;

class PostController
{
    public function show(int $id): Response
    {
        $content = "<h1>Post - $id</h1>";

        return new Response($content);
    }
}
