<?php

namespace webfiles\app\controllers;

use webfiles\app\models\Query;

class RegisterController extends Controller
{
    public static function index()
    {
        $error = '';
        $_SESSION['error'] = 0;
        if (!isset($_SESSION['nom'])) {
            if ($_POST) {
                if (isset($_POST["mail"])) {
                    $_SESSION["mail"] = htmlentities(trim($_POST["mail"]));
                } else {
                    $error .= "<div>email non renseigné</div>";
                    $_SESSION['error'] = true;
                }
                if (isset($_POST["motdepasse"])) {
                    $_SESSION["motdepasse"] = htmlentities(trim($_POST["motdepasse"]));
                } else {
                    $error .= "<div>mot de passe non renseigné</div>";
                    $_SESSION['error'] = true;
                }
                if (isset($_POST["nom"])) {
                    $_SESSION["nom"] = htmlentities(trim($_POST["nom"]));
                } else {
                    $error .= "<div>nom non renseigné</div>";
                    $_SESSION['error'] = true;
                }
                if (isset($_POST["prenom"])) {
                    $_SESSION["prenom"] = htmlentities(trim($_POST["prenom"]));
                } else {
                    $error .= "<div>prenom non renseigné</div>";
                    $_SESSION['error'] = true;
                }
                if (Query::single('users', "email = '" . $_SESSION["mail"] . "'") != false) {
                    $error .= "<div>email deja utiliser</div>";
                    $_SESSION['error'] = true;
                }
                if ($_SESSION['error'] != true) {
                    Query::insert("users", ["nom" => $_SESSION["nom"], "prenom" => $_SESSION["prenom"], "email" => $_SESSION["mail"], "password" => $_SESSION["motdepasse"]]);
                    header('Location: /user');
                }
            }
            else{
                self::render("register", ["title" => "register", "error" => $error]);
            }
        }
        else{
            header('Location: /user');
        }
    }
}