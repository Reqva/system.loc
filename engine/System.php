<?php

namespace Engine;

class System
{
    private $di;
    private $router;

    public function __construct($di)
    {
        $this->di = $di;
        $this->router = $this->di->get('router');
    }

    public function run()
    {
        $this->router->controllerInit();

        list($class, $action) = explode(':', $this->router->getController(), 2);

        $controller = '\\System\\Controller\\' . $class;
        $parameters = $this->router->getParameters();

        $enterController = new $controller($this->di, $parameters);
        $enterController->$action();
    }
}