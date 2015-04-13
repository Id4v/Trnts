<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 06/04/15
 * Time: 23:00
 */

namespace Id4v\TorrentsBundle\Controller;


use Id4v\CoreBundle\Controller\BaseController;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends BaseController {

    public function indexAction(Request $request, Application $app){
        return $this->render("home.html.twig");
    }
}