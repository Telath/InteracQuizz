<?php

namespace webfiles\app\controllers;

use webfiles\app\controllers\Controller;
use webfiles\app\models\Query;
use webfiles\config\Config;

class LoginController extends Controller
{
    public static function index(){
        $error = '';
        if (!isset($_SESSION['nom'])) {
            if ($_POST) {
                $email = htmlentities(trim($_POST["mail"]));
                $mdp = htmlentities(trim($_POST["motdepasse"]));
                if (Query::single('users', "email = '{$email}' AND password = '{$mdp}'") != false) {
                    $profil = Query::single('users', "email = '{$email}' AND password = '{$mdp}'");
                    $_SESSION['email'] = $profil['email'];
                    $_SESSION['nom'] = $profil['nom'];
                    $_SESSION['prenom'] = $profil['prenom'];
                    header('Location: /user');
                }
                else{
                    if (empty($_POST['mail'])){
                        $error .= "<div>Veuillez renseigner votre email</div>";
                    }
                    elseif (empty($_POST['motdepasse'])){
                        $error .= "<div>Veuillez renseigner votre mot de passe</div>";
                    }
                    else{
                        $error = "<div>vos identifiants ne sont pas correct</div>";
                    }
                }
            }
            self::render("login", ["title" => "login", "error" => $error]);
        }
        else{
            header('Location: /user');
        }
    }
}