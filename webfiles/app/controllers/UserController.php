<?php

namespace webfiles\app\controllers;

use webfiles\app\controllers\Controller;
use webfiles\app\models\Query;

    class UserController extends Controller{
        private static $table = "users";

        public static function index(){
            // self::render("default");
            $queryResult = Query::findAll(self::$table, 'id DESC');
            self::render('all', ["donnees" => $queryResult]);
        }

        // public static function all(){
        //     $queryResult = Query::findAll(self::$table, 'id DESC');
        //     self::render('all', ["donnees" => $queryResult]);
        // }

        public static function single($id){
            $queryResult = Query::single(self::$table, "id = {$id}");
            self::render('single', ["userData" => $queryResult]);
        }

        public static function userRegister(){
            $nom = $_POST["nom"];            
            $prenom = $_POST["prenom"];            
            $email = $_POST["email"];            
            $motdepasse = $_POST["motdepasse"];
            $role = FALSE;          
        }
        
        public static function userConnexion(){

        }

        public static function find($id){
            $queryResult = Query::single(self::$table, "id = {$id}");
            self::render('single', ["userData" => $queryResult]);
        }
    }