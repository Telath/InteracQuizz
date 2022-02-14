<?php 
    namespace webfiles\app\controllers;

    use webfiles\app\controllers\Controller;
    use webfiles\app\models\Query;
    use webfiles\app\models\QuizzModel;

    class QuizzController extends Controller{
        
        private static $table = "quizz";

        public static function index(){
            if (isset($_SESSION['nom'])) {
                $queryResult = Query::findAll(self::$table, 'id DESC');
                for ($i=0; $i < count($queryResult); $i++){
                    $queryResult[$i]["techno"] = Query::single("techno", "id = {$queryResult[$i]["technoid"]}");
                }
                self::render('all', ["donnees" => $queryResult]);
            }
            else{
                header('Location: /login');
            }
        }

        public static function single($name){
            if (isset($_SESSION['nom'])) {
                $queryResult = QuizzModel::single($name);
                self::render('single', ["donnees" => $queryResult]);
            }
            else{
                header('Location: /login');
            }
        }

        public static function find($quizzName, $questionId){
            if (isset($_SESSION['nom'])) {
                $quizzID = QuizzModel::findQuizzId($quizzName);
                $quizzID = implode($quizzID);

                $queryQ = QuizzModel::findQuestion($quizzID, $questionId);
                $queryR = QuizzModel::findResponses($quizzID, $questionId);

                self::render('single', ["Questions" => $queryQ, "Answers" => $queryR]);
            }
            else{
                header('Location: /login');
            }
        }

        public static function default($quizzName){
            if (isset($_SESSION['nom'])) {
                /* Find the name, content & title of the quizz */
                $queryN = QuizzModel::findName($quizzName);
                /* Render the default view, array with title and the technology */
                self::render('default', ["Name" => $queryN, "Techno" => $quizzName]);
            }
            else{
                header('Location: /login');
            }
        }

        public static function edit($quizzName){
            if (isset($_SESSION['nom'])) {
                /* Find the name, content & title of the quizz */
                $queryN = QuizzModel::findName($quizzName);
                var_dump($queryN, $quizzName);
                /* Render the default view, array with title and the technology */
                self::render('edit', ["Name" => $queryN, "Techno" => $quizzName]);
            }
            else{
                header('Location: /login');
            }
        }

        public static function notes($quizzName){
            if (isset($_SESSION['nom'])) {
                self::render('edit', ["Techno"=>$quizzName]);
            }
            else{
                header('Location: /login');
            }
        }

    }