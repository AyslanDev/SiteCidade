<?php

namespace app\controllers;

class HomeController extends Controller
{    
    
    public function __construct()
    {
        
    }

    public function home(){
        Controller::view("home");
        var_dump(Controller::view("home"));
    }

    public function blog(?array $data){
        echo "<h1>Entrou no blog</h1>";
        var_dump($data);
    }

}