<?php 
namespace webfiles\app\controllers;

use webfiles\config\Config;

abstract class Controller{

    /**
    * @return string Called controller name (mostly for childs which extends).  
    */
    public static function getControllerName():string{
        return substr(strrchr(get_called_class(),"\\"), 1);
    }

    /**
    * @return string Description a faire. (in english)  
    */
    public static function getFolderName():string{
        return str_replace("Controller", "", self::getControllerName());
    }

/*     public static function default(){
        self::render("default");
    } */
 
    /**
    * Require a file (only if exists)
    *
    * @param string $path 
    * @param string $file : Nom du fichier à require
    * @return void 
    */
    public static function requireFile(string $path, string $file):void{
        if(file_exists($path."{$file}.php")){
            require_once $path."{$file}.php";
        }
    }

    /**
    * Render a specific view (Called inside the childs controllers).
    *
    * @param string $file : The view filename (without the extension)
    * @param array $extraParams : Params given to the view if needed (default value set to NULL) 
    */

    public static function render(string $file, array $params = NULL):void{

        $viewPath = Config::appPath()["view"];

        if($params){
            extract($params);
        }

        // If the URI is empty the controller would be HomeController.
        // If it is, just require the homepage.php file available at  
        // the roots of the views folder. 
        if(self::getControllerName() === "HomeController"){
            require_once $viewPath."{$file}.php";
        }

        // Si il s'agit de tout autre controlleur
        else{
            // Récupère le chemin des vues et lui aujoute le répertoire au duquel sont stockées les bonnes vues
            $viewPath .= self::getFolderName()."/";

            // Si la vue demandée existe //
            if(file_exists($viewPath."{$file}.php")){
                require_once $viewPath."{$file}.php";
            }

            // Si la vue demandée n'existe pas //
            else{
                require_once $viewPath."errors/404.php";
            }
        }


    }
}
