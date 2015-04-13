<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 06/04/15
 * Time: 21:46
 */

namespace Id4v\CoreBundle\Router;


use Silex\Application;
use Silex\ServiceProviderInterface;

class Router implements ServiceProviderInterface{


    /**
     * Registers services on the given app.
     *
     * This method should only be used to configure services and parameters.
     * It should not get services.
     */
    public function register(Application $app)
    {
    }

    /**
     * Bootstraps the application.
     *
     * This method is called after all services are registered
     * and should be used for "dynamic" configuration (whenever
     * a service must be requested).
     */
    public function boot(Application $app)
    {

        $default=isset($app["routing_file"])?$app["routing_file"]:__DIR__."/../../../../config/routes.yml";

        $app->register(new \DerAlex\Silex\YamlConfigServiceProvider($default));


        foreach($app["config"]["routes"] as $name => $route){
            $methods=$route["methods"];
            $action=$route["controller"];
            $path=$route["path"];
            $parts=explode("::",$action);
            $controller=$parts[0];


            $app->match($path,$action."Action")
              ->bind($name)
              ->method($methods)
              ->before($controller."::preExecute")
              ->after($controller."::postExecute");
        }
    }
}