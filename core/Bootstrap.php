<?php

namespace core;

use core\lib\Route;

class Bootstrap
{
    static public function run()
    {
        $route = new Route();
        $controller = $route->controller;
        $action = $route->action;
        $controllerFile = APP . '/Controller/' . $controller . 'Controller.php';
        if (is_file($controllerFile)) {
            include $controllerFile;
            $ctrl = new \App\Controller\IndexController();
            $ctrl->$action();
        } else {
            throw new \Exception('not found controller' . $controller);
        }
    }
}