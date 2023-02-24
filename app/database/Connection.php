<?php

namespace app\database;

use PDO;
use Exception;

class Connection extends Conexao
{

    public $conexao = null;

    public function conecta()
    {
        $this->conexao = $this->connect();

        return $this->conexao;
    }    

}