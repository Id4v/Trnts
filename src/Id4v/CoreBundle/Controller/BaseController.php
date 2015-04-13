<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 06/04/15
 * Time: 22:56
 */

namespace Id4v\CoreBundle\Controller;


use Silex\Application;
use Silex\Provider\TwigServiceProvider;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class BaseController {

    /** @var Application */
    private static $app;
    /** @var  Request */
    private static $request;

    protected function render($twig,$params=array()){
        /** @var TwigServiceProvider $twig */
        return self::$app["twig"]->render($twig,$params);
    }

    protected function getRequest(){
        return $this->request;
    }

    public function preExecute(Request $request,Application $application){
        self::$request=$request;
        self::$app=$application;
    }

    public function postExecute(Request $request,Response $response, Application $application){

    }
}