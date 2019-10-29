<?php

use PHPUnit\Framework\TestCase;

class RendererTest extends TestCase
{
    public function testMethodsExist()
    {
        $this->assertTrue( method_exists(new Foobar, 'scopedRender') );
    }

    public function testCallings()
    {
        $this->expectOutputString('FOO=bar/Foobar');

        $foobar = new Foobar;
        echo $foobar->scopedRender(XPL_TEST_PATH . '/template.phtml', ['foo' => 'bar']);
    }
}