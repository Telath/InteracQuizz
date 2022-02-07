<?php 
    namespace webfiles\config;

    class Config{
        private $settingsArray;
        private static $instance;

        private function __construct(){
            $this->settingsArray = json_decode(file_get_contents(__DIR__."\settings.json"), true);
            return $this->settingsArray;
        }
        
        public static function allSettings():array{
            if(self::$instance == NULL){
                self::$instance = new Config();
            }

            return self::$instance->settingsArray;
        }
        
        public static function dbSettings():array{
            return self::allSettings()["database"];
        }
        
        public static function webPath():array{
            return self::allSettings()["website"];
        }
    }
    


