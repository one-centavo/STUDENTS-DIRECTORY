<?php
namespace App\controllers;
use App\View;
class dashboardController{
    public function index(){
        View::render("dashboard");
    }
}