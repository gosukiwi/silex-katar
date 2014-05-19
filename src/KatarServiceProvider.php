<?php
namespace KatarServiceProvider;

use Silex\Application;
use Silex\ServiceProviderInterface;

require_once __DIR__ . '/composer/autoload.php';

class KatarServiceProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app['katar'] = $app->share(function ($cache) use ($app) {
            if(!$cache) {
                $cache = $app['katar.cache_dir'];
            }

            $katar = new Katar\Katar($cache);
            return $katar;
        });
    }

    public function boot(Application $app)
    {
    }
}
