<?php
namespace KatarServiceProvider;

use Silex\Application;
use Silex\ServiceProviderInterface;

require_once __DIR__ . '/composer/autoload.php';

class KatarServiceProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app['katar'] = $app->share(function ($tpl, $cache = null, 
            $debug = null) use ($app) {

            // Set configuration values
            $app['katar.views_path'] = $tpl;
            $app['katar.views_cache'] = $cache;
            $app['katar.debug'] = is_null($debug)
                ? false
                : $debug;

            $katar = new Katar\Katar($app['katar.views_path'], 
                $app['katar.views_cache'], $app['katar.debug']);

            return $katar;
        });
    }

    public function boot(Application $app)
    {
    }
}
