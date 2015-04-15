<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 06/04/15
 * Time: 23:00
 */

namespace Id4v\TorrentsBundle\Controller;


use Id4v\CoreBundle\Controller\BaseController;
use Id4v\TorrentsBundle\Utils\BetaSeriesApi;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends BaseController {

    public function indexAction(Request $request, Application $app){
        $BSApi=new BetaSeriesApi($app["config"]["api"]["betaseries"]);
        $results=$BSApi->get("shows/random");

        return $this->render("home.html.twig");
    }
}