<?php

namespace Engine\Core\Router;

use Engine\Helper\Common;

class Router
{
    private $routes;
    private $controller;
    private $parameters;

    public function __construct()
    {
        $this->routes = require_once __DIR__ . '/../../Config/Route.php';
    }

    public function controllerInit()
    {
        $uri = Common::getUri();

        foreach ($this->routes as $pattern => $controller) {
            $pattern = '#^' . $pattern . '$#s';
            if (preg_match($pattern, $uri, $parameters)) {
                $this->controller = $controller;
                $this->parameters = $parameters[1];
                return;
            }
        }

        $this->controller = 'ErrorController:index';
        return;
    }

    public function getController()
    {
        return $this->controller;
    }

    public function getParameters()
    {
        return $this->parameters;
    }
}