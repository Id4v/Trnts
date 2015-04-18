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
use Id4v\TorrentsBundle\Utils\T411Api;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends BaseController {

    public function indexAction(Request $request, Application $app){
        $BSApi=BetaSeriesApi::getInstance($app["config"]["api"]["betaseries"]);
        $BSApi->authUser("moustik","jegerdansk");
        $shows=json_decode($BSApi->get("episodes/list"));

        return $this->render("home.html.twig",array("response"=>$shows));
    }

    public function searchAction(Request $request, Application $app){
        $episodeId=$request->get("id");

        $BSApi=BetaSeriesApi::getInstance($app["config"]["api"]["betaseries"]);
        $episode=$BSApi->get("episodes/display?id=$episodeId");
        $episode=json_decode($episode);
        $episode=$episode->episode;

        if($episode->show) {

            $t411Api = T411Api::getInstance($app["config"]["api"]["t411"]);
            $t411Api->authUser("moustik1234", "jegerdansk");
            $title = str_replace(" ", "|", $episode->show->title);
            $query = $title . "+" . $episode->code . "+720+VOSTFR";
            $torrents = $t411Api->get("torrents/search/" . $query);
            $torrents = json_decode($torrents);
        }else{
            $torrents=new \StdClass();
            $torrents->torrents=array();
        }
        return $this->render("search.html.twig",array("torrents"=>$torrents->torrents));
    }
}