<?php

use PHPUnit\Framework\TestCase;

class RunkitTest extends TestCase
{
    public function testMethodsExist()
    {
        $this->assertTrue( method_exists(new Foo, 'with') );
    }

    public function testReturnType()
    {
        $foo = new Foo;
        
        $this->assertInstanceOf(
            Foo::class,
            $foo->with(function() {})
        );
    }

    public function testCalling()
    {
        $foo = new Foo;

        $this->expectOutputString('TEST1234OK');
        $foo->with(function($a, $b) {
            $this->print($a);
            $this->print($b);
            $this->print('OK');
        },  'TEST', 1234);
    }
}