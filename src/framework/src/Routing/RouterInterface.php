<?php

namespace Aruka\Framework\Routing;

use Aruka\Framework\Http\Request;

interface RouterInterface
{
    public function dispatch(Request $request);
}
