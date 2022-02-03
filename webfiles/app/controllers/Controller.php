<?php 

/* if(isset($_GET["action"])){
    echo "Je suis un controller";
}

else{
    echo "ACCUEIL";
} */

class Controller{

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