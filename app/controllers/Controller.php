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

    public function __construct()
    {
        $this->conn = $this->conecta();
        return $this->conn;
    }   

    public function registros($query)
    {
        $total = $query->rowCount();
        return $total;
    }

    public function getAll(string $table)
    {
        $data = [];
        $qr = $this->consulta("SELECT * FROM {$table}");           
        if($this->registros($qr) > 0)
        {
            while($row = $this->resultado($qr))
            {
                $data = $row;
            }
        }        
        return $data;
    }

    public function getById(string $table, int $id)
    {        
        $arrayValue[':id'] = $id;
        $qr = $this->consulta("SELECT * FROM {$table} WHERE Id = :id", $arrayValue);           
        if($this->registros($qr) > 0)
        {   
            $row = $this->resultado($qr);         
        }        
        return $row;
    }

    public function InsertValues(string $table, array|string $campos, array|string $values)
    {



    }


}