<?php

require 'vendor/autoload.php';

use CoffeeCode\Router\Router;

$router = new Router('_SITE_');
$router->namespace('\app\controllers');

$router->group("");  
$router->get("/", "HomeController:home");
$router->get("/blog", "HomeController:blog");
$router->get("/blog/{params}", "HomeController:blog");

$router->group("oops");  
$router->get("/{errcode}", "ErrorController:home");

$router->dispatch();

if($router->error()){
    $router->redirect("/oops/{$router->error()}");
}