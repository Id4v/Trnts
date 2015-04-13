<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 06/04/15
 * Time: 21:28
 */

// web/index.php
require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();

$app["debug"]=true;

$app->register(new \Id4v\CoreBundle\Router\Router());
$app->register(new Silex\Provider\TwigServiceProvider(), array(
  'twig.path' => array(__DIR__."/views",__DIR__.'/../src/Id4v/TorrentsBundle/Resources/views'),
));
// ... definitions


$app->run();