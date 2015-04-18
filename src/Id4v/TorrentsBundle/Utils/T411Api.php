<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 18/04/15
 * Time: 22:56
 */

namespace Id4v\TorrentsBundle\Utils;


class T411Api extends ApiClass{

    private $token;

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
        $this->baseUrl="https://api.t411.io/";
        if(isset($config['baseUrl'])){
            $this->baseUrl=$config["baseUrl"];
        }

        $headers=array(
          "Accept: application/json",
        );
        $this->headers=$headers;
    }

    protected function setHeaders(&$curl, $headers)
    {
        $headers[]="Authorization: ".$this->token;

        parent::setHeaders($curl,
          $headers);
    }

    public function authUser($login,$mdp){

        $params=array(
          "username"=>$login,
          "password"=>$mdp
        );

        $datas=$this->post("auth",$params);
        $datas=json_decode($datas);
        $this->token=$datas->token;
        return $datas;
    }

}