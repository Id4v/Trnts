<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 15/04/15
 * Time: 21:03
 */

namespace Id4v\CoreBundle\Kernel;


class BaseKernel {

    private $app;
    protected $bundles;

    function __construct(\Silex\Application $app)
    {
        $this->app=$app;
    }


    public function boot()
    {
        $this->registerBundles();

        foreach ($this->bundles as $bundle) {
            $bundle->load($this->app);
        }

    }
}