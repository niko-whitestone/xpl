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

Example 1a (Foo.php)
```php
class Foo {
    use Whitestone\Xpl\Runkit;

    public function print($x)
    {
        echo "{$x}\n";
    }
}
```

Example 1b (index.php)
```php
$foo = new Foo;
$foo->with(function($time) {
    $this->print($time);
    $this->print('OK');
}, time());
```

Expected output 1
```html
1572350237\n
OK\n
```

## `trait Whitestone\Xpl\Pathkit`

Helper for detecting current file location inside class context.

Example 1a (Bar.php)
```php
abstract class Bar {
    use Pathkit;

    public function add()
    {
        $filePath = $this->myFilename();
        error_log("Deprecated method Bar->add() called in '{$filePath}'!");
    }
}
```

Example 1b (Foobar.php)
```php
class FooBar extends Bar
{

}
```

Expected output 1
```html
Deprecated method Bar->add() called in '.*/Foobar.php'
```

## `trait Whitestone\Xpl\Renderer`

Helper for rendering files with output buffering on current scope (without overflowing variables)

Example 1a (View.php):
```php
class View {
    use Renderer;
}
```
Example 1b (template.phtml)
```php
<?= $foo; ?>\n
<?= get_class($this); ?>
```

Example 1c (index.php)
```php
$view = new View;
echo $view->scopedRender('template.phtml', ['foo' => 'bar']);
```

Expected output 1
```html
bar\n
View
```