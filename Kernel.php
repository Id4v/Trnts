<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 15/04/15
 * Time: 20:54
 */

class Kernel extends \Id4v\CoreBundle\Kernel\BaseKernel{

    protected function registerBundles(){
        $this->bundles=array(
            new \Id4v\CoreBundle\Id4vCoreBundle(),
            new \Id4v\TorrentsBundle\Id4vTorrentsBundle()
        );
    }



}