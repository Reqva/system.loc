<?php
namespace Engine\Service\Load;

use Engine\Service\AbstractProvider;
use Engine\Core\Load\Load;

class Provider extends AbstractProvider
{
    public $serviceName = 'load';

    public function init()
    {
        $load = new load($this->di);

        $this->di->set($this->serviceName, $load);
    }
}