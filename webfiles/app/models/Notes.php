<?php
    namespace webfiles\app\models;

    use webfiles\app\models\Database;
    class Notes{

        private $id;

        public static function addNote(){

        }

        public static function updateNote(){

        }

        public static function deleteNote(string $table, int $id):void{

        }

        
        public static function getNotes(int $id){
            $req = "SELECT notes.note, quizz.nom FROM quizz INNER JOIN notes ON quizz.id = notes.quizzid WHERE notes.userid = '{$id}'";
            return Database::dbConnect()->query($req)->fetchAll(\PDO::FETCH_ASSOC);
        }
    }