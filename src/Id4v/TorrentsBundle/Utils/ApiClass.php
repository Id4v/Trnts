<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 07/04/15
 * Time: 22:37
 */

namespace Id4v\TorrentsBundle\Utils;


class ApiClass {
    private $url;
    private $headers;


    private function setHeaders(&$curl,$headers){
        curl_setopt($curl,CURLOPT_HEADER,$headers);
    }

    public function post($url,$params=array(),$headers=array()){
        $curl=curl_init($url);

        $this->setHeaders($curl,$headers);

        curl_setopt($curl,CURLOPT_POST,1);
        curl_setopt($curl,CURLOPT_POSTFIELDS,$params);
    }

}