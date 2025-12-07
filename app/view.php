<?php

    namespace App;
    
    class view{
        public static function render(string $view, array $data = []){
            extract($data);
            
            $viewPath = "app/views/{$view}-view.php";
            if(!file_exists($viewPath)){
                view::renderOnly("404");
                return;
            }

            ob_start();
            include_once $viewPath;
            $content = ob_get_clean();

            include_once "app/views/inc/main.php";
        }

        public static function renderOnly(string $view, array $data = []) {
        
            extract($data);

            $viewPath = "app/views/$view-view.php";

            if (!file_exists($viewPath)) {
                require_once "app/views/404-view.php";
                return;
            }   

            require_once $viewPath;
    }


    }