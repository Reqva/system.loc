<?php
namespace Engine\Service\Database;

use Engine\Service\AbstractProvider;
use Engine\Core\Database\Connect;

class Provider extends AbstractProvider
{
    public $serviceName = 'db';

    public function init()
    {
        $db = new Connect();

        $this->di->set($this->serviceName, $db);
    }
}