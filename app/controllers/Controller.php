<?php

namespace app\controllers;

use Exception;
use League\Plates\Engine;

class Controller{    

    public static function view(string $view, array $data = [])
    {
        $viewPath = dirname(__FILE__, 3)."/theme";        

        if(!file_exists($viewPath.DIRECTORY_SEPARATOR.$view.".php")){
            throw new Exception("A view ".$viewPath.DIRECTORY_SEPARATOR.$view." não existe");
        }

        $template = new Engine($viewPath);
        $template->render($view, $data);
    }

}