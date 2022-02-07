<?php 
    namespace webfiles\app\controllers;

    use webfiles\app\controllers\Controller;
    use webfiles\app\models\Query;
    use webfiles\app\models\QuizzModel;

    class QuizzController extends Controller{
        
        private static $table = "quizz";

        public static function all(){
            $queryResult = Query::findAll(self::$table, 'id DESC');
            self::render('all', ["donnees" => $queryResult]);
        }

        public static function single($name){
            $queryResult = QuizzModel::single($name);
            self::render('single', ["donnees" => $queryResult]);
        }

        public static function find($quizzName, $questionId){

            $quizzID = QuizzModel::findQuizzId($quizzName);
            $quizzID = implode($quizzID);
            $queryQ = QuizzModel::findQuestion($quizzID, $questionId);
            $queryR = QuizzModel::findResponses($quizzID, $questionId);

            self::render('single', ["Questions"=>$queryQ, "Answers"=>$queryR]);
        }

    }