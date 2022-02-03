<?php 

use webfiles\config\Config;

abstract class Controller{

    public static function render($vue):void{

        $viewPath = Config::webPath()["view"];

        if(file_exists($viewPath."{$vue}.php")){
            // Render la bonne vue //
            require_once $viewPath."{$vue}.php";
        }
        else{
            // Render la bonne vue //
            require_once $viewPath."notFound-404.php";
        }
    }
}