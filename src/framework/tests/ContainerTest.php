<?php

namespace Aruka\Framework\Tests;

use Aruka\Framework\Container\Container;
use Aruka\Framework\Container\Exceptions\ContainerException;
use PHPUnit\Framework\TestCase;

class ContainerTest extends  TestCase
{
    public function test_getting_service_from_container()
    {
        $container = new Container();

        $container->add('aruka-class', ArukaClass::class);

        $this->assertInstanceOf(ArukaClass::class,$container->get('aruka-class'));
    }

    public function test_container_has_exception_ContainerException_if_add_wrong_service()
    {
        $container = new Container();

        $this->expectException(ContainerException::class);

        $container->add('no-class');
    }

    public function test_has_method()
    {
        $container = new Container();

        $container->add('aruka-class', ArukaClass::class);

        $this->assertTrue($container->has('aruka-class'));
        $this->assertFalse($container->has('no-class'));

    }

    public function test_recursively_autowired()
    {
        $container = new Container();

        $container->add('aruka-class', ArukaClass::class);

        /** @var ArukaClass $aruka $aruka */
        $aruka = $container->get('aruka-class');

        $arukaClassAnother = $aruka->getArukaClassAnother();

        $this->assertInstanceOf(ArukaClassAnother::class,$aruka->getArukaClassAnother());
        $this->assertInstanceOf(YouTube::class,$arukaClassAnother->getYoutube());
        $this->assertInstanceOf(Telegram::class,$arukaClassAnother->getTelegram());
    }
}
