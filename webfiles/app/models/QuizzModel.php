<?php

    namespace webfiles\app\models;
    
    use webfiles\app\models\Database;

    class QuizzModel
    {
        public static function single(string $name):array
        {
            $req = "SELECT * FROM quizz INNER JOIN techno ON techno.id = quizz.technoid WHERE techno.nom = '{$name}'";
            return Database::dbConnect()->query($req)->fetch(\PDO::FETCH_ASSOC);
        }

        public static function findQuizzId($name){
            $req = "SELECT id FROM techno WHERE nom LIKE '{$name}'";
            return Database::dbConnect()->query($req)->fetch(\PDO::FETCH_ASSOC);
        }
        
        public static function findQuestion($id, $questionId){
            $req = "SELECT intitule FROM questions WHERE quizzid = {$id} AND nbquestion = {$questionId}";
/*             var_dump($req); */
            return Database::dbConnect()->query($req)->fetch(\PDO::FETCH_ASSOC);
        }

        /** 
        * @param int id : refers to the question ID
        * @return array Returns the possible answers (EACH : not only the good ones). 
        */

        public static function findResponses($id, $questionId){
            $req = "SELECT contenu, nbquestion FROM reponses INNER JOIN questions ON questions.id = reponses.questionid WHERE nbquestion = {$questionId} AND reponses.quizzid = $id";
            return Database::dbConnect()->query($req)->fetchAll(\PDO::FETCH_ASSOC);
        }
    }