<?php

namespace app\database;

use PDO;
use Exception;

abstract class Conexao{

    private $host = "localhost";
    private $dbName = "db_restaurante_modelo";
    private $password = "";
    private $user = "root";

    public function connect()
    {
 
        try{
            $conexao = new PDO('mysql:host=' . $this->host . ';dbname='. $this->dbName, $this->user, $this->password);
            return $conexao;
            var_dump("conectou");
        }catch(Exception $erro){
            echo $erro->getMessage();
        }


    }    

}

