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
                        /* Loads the index method from the specified controller */
                        $controllerCall = $ctrl."index";
                        $controllerCall();
                        break;
                    case 2:

                        if(ctype_digit($var[1])){
                            /* Loads single */
                            $controllerCall = $ctrl."find";
                            $controllerCall($var[1]);
                        }
                        else{
                            $controllerCall = $ctrl."default";
                            $controllerCall($var[1]);
                        }

                        /* Loads single */
                        // $controllerCall = $ctrl."find";
                        // $controllerCall($var[1]);
/*                         QuizzController::find("html"); */

                        break;
                    case 3:
                        // If the 3rd parameter is integer //
                        if(ctype_digit($var[2])){
                            /* Loads single */
                            $controllerCall = $ctrl."find";
                            $controllerCall($var[1], $var[2]);
                            /*                             echo "Salut les potes à la compote."; */
                            /*                             QuizzController::find("html", "1");
                            UserController::find("session", "1"); */
                        }
                        
                        // If it is type text 
                        else{
                            $controllerCall = $ctrl."$var[2]";
                            
                            var_dump(method_exists(substr($ctrl,0,-2), "$var[2]"));
                            // $controllerCall($var[1]);
                        }
/*                         $controllerCall = $ctrl."{$var[1]}";
                        $controllerCall($var[2]); */
                        break;
                } 
            }
        }
    }
