<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 15/04/15
 * Time: 22:51
 */

namespace Id4v\TorrentsBundle\Utils;


class BetaSeriesApi extends ApiClass{
    private $token="";


    function __construct($config=array())
    {
        $this->headers=array();
        $this->baseUrl="http://api.betaseries.com/";
        if(isset($config['baseUrl'])){
            $this->baseUrl=$config["baseUrl"];
        }

        $headers=array(
            "Accept: application/json",
        );

        if(isset($config["version"])){
            $headers[]="X-BetaSeries-Version: ".$config["version"];
        }

        if(!isset($config["key"])){
            return null;
        }
        $headers[]="X-BetaSeries-Key: ".$config["key"];
        $headers[]="X-BetaSeries-Token: ".$this->token;
        $this->headers=$headers;
    }

}