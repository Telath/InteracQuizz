<?php

    class UserController{
        private static $table = "users";

        public static function userRegister(){
            $nom = $_POST["nom"];            
            $prenom = $_POST["prenom"];            
            $email = $_POST["email"];            
            $motdepasse = $_POST["motdepasse"];
            $role = FALSE;          
        }
        
        public static function userConnexion(){

        }
    }