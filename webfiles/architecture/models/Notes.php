<?php

    class Notes{

        private $id;

        public static function addNote(){

        }

        public static function updateNote(){

        }

        public static function deleteNote(string $table, int $id):void{
            $req = "DELETE FROM {$table} WHERE id=$id";
            self::genericQuery($req)->fetchAll();
        }
    }