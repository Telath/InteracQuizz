<?php

namespace webfiles\app\controllers;

use webfiles\app\controllers\Controller;
use webfiles\app\models\Query;
use webfiles\config\Config;

class LoginController extends Controller
{
    public static function index(){
        if ($_POST)
        {
            $email = htmlentities(trim($_POST["mail"]));
            $mdp = htmlentities(trim($_POST["motdepasse"]));
            echo Config::appPath()["view"]."quizz/all.php";
            if (Query::single('users', "email = '{$email}' AND password = '{$mdp}'"))
            {
                header('Location: /user');
            }
        }
        else
        {
            self::render("login");
        }
    }
}