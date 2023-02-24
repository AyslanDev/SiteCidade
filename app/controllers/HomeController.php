<?php

namespace app\controllers;
use app\database\Connection;
$conn = new Connection;
class HomeController extends Controller
{                        

    public function __construct()
    {        
        return $this->connectDb();
    }

    public function home(){ 
        
        $qr = $this->consulta("SELECT * FROM tabconfig");
        $dd = $this->resultado($qr);
        print_r("<pre>");
        var_dump($dd);
        print_r("</pre>");
        Controller::view("home", $dd);        
    }

    public function blog(?array $data){
        echo "<h1>Entrou no blog</h1>";
        var_dump($data);
    }

}