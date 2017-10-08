<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Engine\DI\DI;
use Engine\System;

$di = new DI();
$services = require_once 'Config/Service.php';

foreach($services as $service)
{
    $provider = new $service($di);
    $provider->init();
}

$system = new System($di);
$system->run();