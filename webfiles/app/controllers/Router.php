<?php 

    namespace webfiles\app\controllers;

    class Router{

        private static $ctrlNameSpace = "webfiles\app\controllers\\";
            
        public static function start(){
            $url = ltrim($_SERVER["REQUEST_URI"], '/');
            $var = explode("/", $url);
            
            // Retire les élements vides du tableau //
            // Permets ainsi de gérer le / sans rien derrière pour le dernier param de l'URL
            $var = array_filter($var);

            // Si le premier paramètre de l'URL est vide 
            // On doit faire appel au Home Controller //
            if(!$var){
                $controllerCall = self::$ctrlNameSpace."HomeController::index";
                $controllerCall();
            }

            else{
                $ctrl = self::$ctrlNameSpace."{$var[0]}Controller::";

                switch (count($var)) {
                    case 1:
                        $controllerCall = $ctrl."index";
                        $controllerCall();
                        break;
                    case 2:
                        $controllerCall = $ctrl."{$var[1]}";
                        $controllerCall();
                        break;
                    case 3:
                        $controllerCall = $ctrl."{$var[1]}";
                        $controllerCall($var[2]);
                        break;
                } 
            }
        }
    }
