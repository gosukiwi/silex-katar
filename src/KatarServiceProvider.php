<?php
namespace KatarServiceProvider;

use Silex\Application;
use Silex\ServiceProviderInterface;
use Katar\Katar;

class KatarServiceProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app['katar'] = $app->share(function () use ($app) {

            if(!isset($app['katar.views_path'])) {
                $app['katar.views_path'] = $app['request']->getBasePath()
                    . '/views';
            }

            if(!isset($app['katar.views_cache'])) {
                $app['katar.views_cache'] = $app['katar.views_path'] . 
                    '/../cache';
            }

            if(!isset($app['katar.debug'])) {
                $app['katar.debug'] = $app['debug'];
            }

            $katar = new Katar($app['katar.views_path'], 
                $app['katar.views_cache'], $app['katar.debug']);

            return $katar;
        });
    }

    public function boot(Application $app)
    {
    }
}
