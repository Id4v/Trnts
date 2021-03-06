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

    protected static $instance;


    public static function getInstance($config)
    {
        if(self::$instance==null){
            $refCl=new \ReflectionClass(get_called_class());
            self::$instance=$refCl->newInstance($config);
        }
        return self::$instance;
    }

    public function __construct($config=array())
    {
        if(self::$instance != null)
            return;

        $this->headers=array();
        $this->baseUrl="https://api.betaseries.com/";
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
        $this->headers=$headers;
    }


    protected function setHeaders(&$curl, $headers)
    {
        $headers[]="X-BetaSeries-Token: ".$this->token;

        parent::setHeaders($curl,
          $headers);
    }

    public function authUser($login,$mdp){

        $params=array(
            "login"=>$login,
            "password"=>md5($mdp)
        );

        $datas=$this->post("members/auth",$params);
        $datas=json_decode($datas);
        $this->token=$datas->token;
        return $datas;
    }


}