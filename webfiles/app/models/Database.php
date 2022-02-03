<?php

require_once 'C:\laragon\www\interacquizz\InteraQuizz\InteracQuizz\webfiles\config\Config.php';

    class Database{

        private $conn;
        private static $_instance;

        public function __construct(){
            // Connexion à la Database :
            $hote = Config::databaseSettings()["host"];
            $dbname = Config::databaseSettings()["name"];
            $user = Config::databaseSettings()["user"];
            $pass = Config::databaseSettings()["password"];

            $connexion = new PDO('mysql:host='.$hote.'; charset=UTF8; dbname='.$dbname.'', $user, $pass);
            $this->conn = $connexion;
        }

        public static function dbConnect(){
            if(self::$_instance == NULL){
                self::$_instance = new Database;
            }
            return self::$_instance->conn;
        }

























    }