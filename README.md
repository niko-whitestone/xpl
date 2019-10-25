# Whitestone Oy - eXtended PHP Library

<img src="https://www.whitestone.fi/wslogo.png" alt="Whitestone Oy" align="right">
Whitestone\Xpl contains some helper traits and classes for PHP7+.

License: MIT

## Installing & requirements

Requirements:
* PHP 7

You can install Xpl using `composer`:

```
composer require whitestone\xpl
```

## `trait Whitestone\Xpl\Runkit`

Contains single method for running closures in class context with simple parameter passthru.

Example 1:
```php
class Foo {
    use Whitestone\Xpl\Runkit;

    public function print($x)
    {
        echo "{$x}\n";
    }
}

$foo = new Foo;
$foo->with(function($time) {
    $this->print($time);
    $this->print('OK');
}, time());
```

## `trait Whitestone\Xpl\Pathkit`

Helper for detecting current file location inside class context.

Example 1:
```php
class Bar {
    use \Whitestone\Xpl\Pathkit;
    
    public function add()
    {
        $filePath = $this->myFilename();
        error_log("Deprecated method Bar->add() called in '{$filePath}'!");
    }
}
```