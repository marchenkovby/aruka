<?php

namespace Aruka\Framework\Tests;

class ArukaClass
{
    public function __construct(
        private readonly ArukaClassAnother $arukaClassAnother
    )
    {
    }

    public function getArukaClassAnother(): ArukaClassAnother
    {
        return $this->arukaClassAnother;
    }
}
