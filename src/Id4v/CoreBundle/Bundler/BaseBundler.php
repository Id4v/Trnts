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
        $viewDir=$directory."Resources/views";
        if(is_dir($viewDir)) {
            $app['twig.loader.filesystem']->addPath($viewDir);
        }
    }
}