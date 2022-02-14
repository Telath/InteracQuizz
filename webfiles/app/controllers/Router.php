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
                        // If the 2nd parameter is integer //
                        if(ctype_digit($var[1])){
                            /* Loads find method */
                            $controllerCall = $ctrl."find";
                            $controllerCall($var[1]);
                        }
                        else{
                            /* Loads default method */
                            $controllerCall = $ctrl."default";
                            $controllerCall($var[1]);
                        }

                        break;

                    case 3:
                        // If the 3rd parameter is integer //
                        if(ctype_digit($var[2])){
                            /* Loads find method */
                            $controllerCall = $ctrl."find";
                            $controllerCall($var[1], $var[2]);
                        }
                        
                        // If it is type text 
                        else{
                            /* If the method exist */
                            if (method_exists(substr($ctrl,0,-2), "$var[2]")){
                                $controllerCall = $ctrl."$var[2]";
                                var_dump($controllerCall);
                                $controllerCall($var[1]);
                            }
                            /* Render to 404.php */
                            else{
                                echo "404";
                            }
                            
                        }

                        break;

                    default:
                        /* If it's not the cases above */
                        echo "404";
                        break;
                } 
            }
        }
    }
