<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 07/04/15
 * Time: 22:37
 */

namespace Id4v\TorrentsBundle\Utils;


class ApiClass {
    protected $baseUrl;
    protected $headers;



    protected function setHeaders(&$curl,$headers){
        $headers=array_merge($headers,$this->headers);
        curl_setopt($curl,CURLOPT_HTTPHEADER,$headers);
    }

    protected function execute($ch){
        curl_setopt($ch, CURLINFO_HEADER_OUT, true); // enable tracking
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);

        if ($result === FALSE) {
            printf("cUrl error (#%d): %s<br>\n", curl_errno($ch),
                htmlspecialchars(curl_error($ch)));
        }
        //close connection
        curl_close($ch);
        return $result;
    }

    protected function init($endPoint){
        $endPoint=$this->baseUrl.$endPoint;
        return curl_init($endPoint);
    }

    public function post($endPoint,$params=array(),$headers=array()){
        $curl=$this->init($endPoint);

        $this->setHeaders($curl,$headers);

        curl_setopt($curl,CURLOPT_POST,1);
        curl_setopt($curl,CURLOPT_POSTFIELDS,$params);
        return $this->execute($curl);
    }

    public function get($endPoint,$headers=array()){
        $curl=$this->init($endPoint);
        $this->setHeaders($curl,$headers);
        return $this->execute($curl);
    }

    public function delete($endPoint,$headers=array()){
        $curl=$this->init($endPoint);
        $this->setHeaders($curl,$headers);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
        return $this->execute($curl);
    }

    public function put($endPoint,$params=array(),$headers=array()){
        $curl=$this->init($endPoint);

        $this->setHeaders($curl,$headers);

        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($curl,CURLOPT_POSTFIELDS,$params);

        return $this->execute($curl);
    }



}