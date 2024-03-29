<?php

use Whitestone\Xpl\Pathkit;
use Whitestone\Xpl\Runkit;
use Whitestone\Xpl\Renderer;

require_once __DIR__ . '/../vendor/autoload.php';

    define('XPL_TEST_PATH', __DIR__);

    class Foo
    {
        use Runkit;
        use Pathkit;

        public function print($value)
        {
            echo $value;
        }
    }
    
    class Foobar
    {
        use Renderer;
    }
