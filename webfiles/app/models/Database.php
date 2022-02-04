<?php

    namespace webfiles\app\models;

    use webfiles\config\Config;
    
    class Database{

        private $conn;
        private static $_instance;

        public function __construct(){
            // Connexion à la Database :
            $hote = Config::dbSettings()["host"];
            $dbname = Config::dbSettings()["name"];
            $user = Config::dbSettings()["user"];
            $pass = Config::dbSettings()["password"];

            $connexion = new \PDO('mysql:host='.$hote.'; charset=UTF8; dbname='.$dbname.'', $user, $pass);
            $this->conn = $connexion;
        }

        public static function dbConnect(){
            if(self::$_instance == NULL){
                self::$_instance = new Database;
            }
            return self::$_instance->conn;
        }

    }