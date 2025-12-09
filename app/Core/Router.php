<?php

namespace App\Core;

use App\Core\View;

class Router
{
    private string $controller;
    private string $method;
    private array $params = [];

    public function __construct()
    {
        $this->parseRoute();
    }

    private function parseRoute(): void
    {
        $url = isset($_GET['views']) ? explode('/', trim(ucfirst($_GET['views']), '/')) : [];

        $this->controller = $url[0] ?? ucfirst('login');
        $this->method     = $url[1] ?? 'index';
        $this->params     = array_slice($url, 2);
    }

    public function execute(): void
    {
        $controllerClass = "App\\Controllers\\{$this->controller}Controller";

        if (!class_exists($controllerClass)) {
            View::renderOnly("404");
            return;
        }

        $controllerInstance = new $controllerClass();

        if (!method_exists($controllerInstance, $this->method)) {
            View::renderOnly("404");
            return;
        }

        call_user_func_array([$controllerInstance, $this->method], $this->params);
    }
}