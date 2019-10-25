<?php

use PHPUnit\Framework\TestCase;

class PathkitTest extends TestCase
{
    public function testMethodsExist()
    {
        $this->assertTrue( method_exists(new Foo, 'myFileLocation') );
        $this->assertTrue( method_exists(new Foo, 'myFilename') );
    }

    public function testCallings()
    {
        $foo = new Foo;

        $this->assertEquals(XPL_TEST_PATH, $foo->myFileLocation());
        $this->assertEquals(XPL_TEST_PATH . '/bootstrap.php', $foo->myFilename());
    }
}