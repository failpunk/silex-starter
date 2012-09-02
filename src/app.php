<?php
require_once __DIR__.'/../vendor/autoload.php';

use Silex\Provider\TwigServiceProvider;
use Silex\Provider\SessionServiceProvider;

$app = new Silex\Application();

/**  Application */

$app->register(new SessionServiceProvider());
$app->register(new TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views',
));

/**  Config */
$app['config'] = [
    'web_dir' => '/climb'
];

/** Controller */
$app->get('/', function() use($app) {
	return $app['twig']->render('main.twig');
});

return $app;
