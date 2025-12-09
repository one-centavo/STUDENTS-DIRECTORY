<?php
namespace App\controllers;
use App\Core\View;
class dashboardController{
    public function index(){
        View::render("dashboard");
    }
}