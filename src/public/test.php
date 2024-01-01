<?php

class Foo {

    public function __construct(
        public Bar $bar,
    )
    {
    }
}

class Bar {

    public function test(): void
    {
        echo 'I\'m from class with name ' . __CLASS__;
    }
}

$foo = new Foo(new Bar);
$foo->bar->test();
