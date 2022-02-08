<?php

namespace webfiles\app\models;

class UserModel
{
    public static function getNotes(int $id){
        $req = "SELECT notes.note, quizz.nom FROM quizz INNER JOIN notes ON quizz.quizzid = notes.quizzid WHERE notes.userid = {$id}";
        return Database::dbConnect()->query($req)->fetchAll(\PDO::FETCH_ASSOC);
    }

}