<?php
    namespace App\controllers;
    use App\Core\View;
    

    class loginController {
        public function index() {
            View::renderOnly($_GET['views'], ["msg" => ""]);
        }

        
        
    }