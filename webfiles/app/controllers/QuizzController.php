<?php

namespace webfiles\app\controllers;

use webfiles\app\models\Query;
use webfiles\app\models\QuestionModels;

class QuizzController extends Controller
{
    private static $table = "quizz";

    public static function all(){
        $queryResult = Query::findAll(self::$table,'', 'quizzid DESC');
        self::render('all', ["quizzList" => $queryResult]);
    }

    public static function question(){
        $queryResult = QuestionModels::findQuestion('question','', '');
        self::render('all', ["question" => $queryResult]);
    }
}