<?php

namespace App;

use App\View;

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
        $url = isset($_GET['views']) ? explode('/', trim($_GET['views'], '/')) : [];

        $this->controller = $url[0] ?? 'login';
        $this->method     = $url[1] ?? 'index';
    }

    public function execute(): void
    {
        $controllerClass = "App\\controllers\\{$this->controller}Controller";

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