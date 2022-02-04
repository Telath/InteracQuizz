<?php

    namespace webfiles\app\models;
    
    use webfiles\app\models\Database;

    class Model
    {
        public static function insertDB(string $table,array $values):void
        {
            $dbFeilds = '';
            $dbValues = '';
            
            foreach ($values as $key=>$value){
                $dbFeilds .= $key.",";
                $dbValues .= "'".$value."',";
            }
            
            $dbFeilds = rtrim($dbFeilds, ',');
            $dbValues = rtrim($dbValues, ',');

            $req = "INSERT INTO {$table} ({$dbFeilds}) VALUES ($dbValues)";

            Database::dbConnect()->prepare($req)->execute();
        }

        public static function queryFA(string $table,string $where = "",string $order = ""):array
        {
            $req = "SELECT * FROM {$table}";
            if ($order){
                $req .= " ORDER BY {$order}";
            }
            if ($where){
                $req .= " WHERE {$where}";
            }
            return Database::dbConnect()->query($req)->fetchAll();
        }

        public static function delete(string $table,string $where):void
        {
            $req = "DELETE FROM {$table} WHERE {$where}";
            Database::dbConnect()->prepare($req)->execute();
        }

        public static function update(string $table, array $values,string $where):void
        {
            $keyValue = "";
            
            foreach ($values as $key=>$value){
                $keyValue .= $key." = '".$value."',";
            }

            $keyValue = trim($keyValue, ",");
            $req = "UPDATE {$table} SET {$keyValue} WHERE {$where}";
            
            Database::dbConnect()->prepare($req)->execute();
        }
    }