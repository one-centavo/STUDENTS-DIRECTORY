<?php
    const BASE_PATH = __DIR__ . "/";
    require_once BASE_PATH . "vendor/autoload.php";
    require_once BASE_PATH . "config/app.php";

    if(session_status() === PHP_SESSION_NONE){
        session_start();
    }
    use App\Core\Router;
    $router = new Router();
    $router->execute();
?>
