<?php 
namespace webfiles\app\controllers;

use webfiles\config\Config;

abstract class Controller{

    public static function render($vue):void{

        $viewPath = Config::webPath()["view"];
        var_dump($viewPath."{$vue}.php");

        if(file_exists($viewPath."{$vue}.php")){
            require_once $viewPath."{$vue}.php";
        }
        else{
            require_once $viewPath."notFound-404.php";
        }
    }
}