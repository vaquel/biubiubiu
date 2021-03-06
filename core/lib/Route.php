<?php
namespace core\lib;

class Route
{
    public $controller;

    public $action;

    public function __construct()
    {
        $pathArray = [];
        if (isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] != '/') {
            $path = $_SERVER['REQUEST_URI'];
            $pathArray = explode('/', trim($path, '/'));
            if (isset($pathArray[0])) {
                $this->controller = $pathArray[0];
                unset($pathArray[0]);
            }
            if (isset($pathArray[1])) {
                $this->action = $pathArray[1];
                unset($pathArray[1]);
            } else {
                $this->action = 'index';
            }
        } else {
            $this->controller = 'index';
            $this->action = 'index';
        }
        $count = count($pathArray);
        $i = 2;
        while ($i < $count + 2) {
            if(isset( $pathArray[$i + 1])){
                $_GET[$pathArray[$i]] = $pathArray[$i + 1];
            }
            $i = $i + 2;
        }
    }
}