<?php

namespace app\controllers;
use app\database\Connection;
$conn = new Connection;
class HomeController extends Controller
{                        

    private $tabConfig = "tabconfig";
    private $tabTypeProductors = "tabtypeproductors";

    public function __construct()
    {        
        return parent::conecta();
    }

    public function home(){ 
        
        $dd = $this->getById($this->tabTypeProductors, 1); 

        Controller::view("home", ["Name" => $dd['Type']]);        
    }

    public function blog(?array $data){
        echo "<h1>Entrou no blog</h1>";
        var_dump($data);
    }

}