<?php

namespace webfiles\app\controllers;

use webfiles\app\controllers\Controller;
use webfiles\app\models\Query;
use webfiles\app\models\UserModels;

class UserController extends Controller{
        private static $table = "users";

        public static function index(){
            self::render("default");
        }

        public static function all(){
            $queryResult = Query::findAll(self::$table,'', 'id DESC');
            self::render('all', ["donnees" => $queryResult]);
        }

        public static function single($id)
        {
            $queryResult = Query::single(self::$table, "id = {$id}");
            $quizz = UserModels::getNotes($id);
            self::render('single', ["userData" => $queryResult, "title" => $queryResult["prenom"], "quizz" => $quizz]);
        }
    }