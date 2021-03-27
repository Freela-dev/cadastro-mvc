<?php

namespace core;

class Router
{

    private $controller = 'Site';
    private $method = 'home';
    private $params = [];
    /**
     * Class constructor.
     */
    public function __construct()
    {
        $router = $this->url(); 
        
        if (file_exists('app/controllers/'.ucfirst($router[0]).'.php')) {
            $this->controller = ucfirst($router[0]);
            unset($router[0]);
        } 

        $class = "\\app\\controllers\\".$this->controller;
        $objClass = new $class();

        if(isset($router[1]) && method_exists($class, $router[1])){
            $this->method = $router[1];
            unset($router[1]);
        }

        $this->params = $router ? array_values($router) : [];

        call_user_func_array([$objClass,$this->method],$this->params);
    }
    private function url()
    {
        $parse_url = explode("/", filter_input(INPUT_GET,'router', FILTER_SANITIZE_URL));
       return $parse_url;
    }
}