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

            if(!is_null($cache)) {
                $app['katar.views_cache'] = $cache;
            }

            if(!is_null($debug)) {
                $app['katar.debug'] = $debug;
            }

            $app['katar.views_path'] = $tpl;

            $katar = new Katar\Katar($app['katar.views_path'], 
                $app['katar.views_cache'], $app['katar.debug']);

            return $katar;
        });
    }

    public function boot(Application $app)
    {
    }
}
