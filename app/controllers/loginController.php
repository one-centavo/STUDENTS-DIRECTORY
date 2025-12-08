<?php
    namespace App\controllers;
    use App\View;
    

    class loginController {
        public function index() {
            View::renderOnly("login", ["msg" => ""]);
        }

        
        
    }