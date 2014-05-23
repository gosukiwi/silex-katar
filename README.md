# Silex Provider for Katar
Katar is a simplistic template engine for PHP based on Blade.

For more information on Katar see the 
[official repo](https://github.com/gosukiwi/katar).

# Usage
Installation is easy though composer

    $ composer require gosukiwi/silex-katar

Then register the service

```php
$app->register(new SilexKatar\KatarServiceProvider(), array(
  'katar.views_path' => __DIR__ . '/views',
  'katar.debug' => false,
));

// Somewhere in your code...

$app->get('/myRote', function () use ($app) {
  // Some code...
  return $app['katar']->render('myView.katar.html', array( 'data' => 'someVal' ));
});
```
