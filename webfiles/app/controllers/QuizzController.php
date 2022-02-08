<?php 
    namespace webfiles\app\controllers;

    use webfiles\app\controllers\Controller;
    use webfiles\app\models\Query;
    use webfiles\app\models\QuizzModel;

    class QuizzController extends Controller{
        
        private static $table = "quizz";

        public static function index(){
            $queryResult = Query::findAll(self::$table, 'id DESC');
            for ($i=0; $i < count($queryResult); $i++){
                $queryResult[$i]["techno"] = Query::single("techno", "id = {$queryResult[$i]["technoid"]}");
            }
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

        public static function default($quizzName){

            /* Find the name, content & title of the quizz */
            $queryN = QuizzModel::findName($quizzName);
            /* Render the default view, array with title and the technology */
            self::render('default', ["Name"=>$queryN, "Techno"=>$quizzName]);
        }

    }