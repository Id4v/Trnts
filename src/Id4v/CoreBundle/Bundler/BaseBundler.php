<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 15/04/15
 * Time: 20:39
 */

namespace Id4v\CoreBundle\Bundler;


use Silex\Application;

class BaseBundler {
    public function load(Application $app){
        $reflection=new \ReflectionClass($this);
        $directory=dirname($reflection->getFileName())."/";
        $app['twig.loader.filesystem']->addPath($directory."Resources/views");
    }
}