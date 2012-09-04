<?php
require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../vendor/facebook/facebook-sdk/src/facebook.php';

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
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$app->get('/', function() use($app) {
	return $app['twig']->render('main.twig');
});

$app->match('/facebook', function () use ($app) {
    $facebook = new Facebook(array(
        'appId'  => 'APP_ID',
        'secret' => 'APP_SECRET',
    ));
    
    $user = $facebook->getUser();
    
    return $app['twig']->render('main.twig');
});

return $app;
