<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 06/04/15
 * Time: 21:28
 */

// web/index.php
require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../Kernel.php';

$app = new Silex\Application();
$app["debug"]=true;

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => array(__DIR__."/views"),
));
$app->register(new \Id4v\CoreBundle\Router\Router());

$kernel = new Kernel($app);
$kernel->boot();

$app->run();