<?php

namespace webfiles\app\models;

class QuestionModels
{
    public static function findQuestion($quizzName, $nbrQuestion){
        $req = "SELECT * FROM questions INNER JOIN quizz ON ";
        return Database::dbConnect()->query($req)->fetchAll(\PDO::FETCH_ASSOC);
    }
}