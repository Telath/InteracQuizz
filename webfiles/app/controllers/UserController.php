<?php

namespace webfiles\app\controllers;

use webfiles\app\controllers\Controller;
use webfiles\app\models\Query;
use webfiles\app\models\Notes;

    class UserController extends Controller{
        private static $table = "users";

        public static function index(){
            if (isset($_SESSION['nom'])) {
                $queryResult = Query::findAll(self::$table, 'id DESC');
                self::render('all', ["donnees" => $queryResult]);
            }
            else{
                header('Location: /login');
            }
        }

        public static function find($id){
            if (isset($_SESSION['nom'])) {
                $queryResult = Query::single(self::$table, "id = {$id}");
                $quizz = Notes::getNotes($id);
                self::render('single', ["userData" => $queryResult, "quizz" => $quizz ]);
            }
            else{
                header('Location: /login');
            }
        }

        public static function edit($userName){

            /* Render the default view, array with title and the technology */
            self::render('edit', ["Name"=>$userName]);
        }
    }