<?php 

    namespace webfiles\app;

    class Autoload{

        public static function register(){
            spl_autoload_register([__CLASS__, "autoload"]);
        }

        public static function autoload($classPath){
            $classPath = str_replace("\\", "/", $classPath);
            include $classPath.".php";
        }

    }

    Autoload::register();