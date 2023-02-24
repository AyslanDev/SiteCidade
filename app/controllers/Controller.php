<?php

namespace app\controllers;

use PDO;
use Exception;
use League\Plates\Engine;
use app\database\Connection;

class Controller extends Connection{  
    
    public $conn = null;

    public static function view(string $view, array $data = [])
    {
        $viewPath = dirname(__FILE__, 3)."/theme";        

        if(!file_exists($viewPath.DIRECTORY_SEPARATOR.$view.".php")){
            throw new Exception("A view ".$viewPath.DIRECTORY_SEPARATOR.$view." não existe");
        }

        $template = new Engine($viewPath);
        echo $template->render($view, $data);
    }

    protected function connectDb()
    {
        $this->conn = $this->conecta();
        return $this->conn;
    }

    public function consulta($query, $array = null ) {

        try {

            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $query  = str_replace('SQL_CACHE', " ", $query);
            
            $consulta = $this->conn->prepare($query);
            $consulta->execute($array);

        } catch (Exception $e) {

            var_dump($e->getMessage());

        }

        return $consulta;
    }

    public function resultado($query) {
        $lista = $query->fetch(PDO::FETCH_ASSOC);
        return $lista;
    }

}