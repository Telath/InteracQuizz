<?php

class GlobalModel
{
    public static function insertDB(string $table,array $values):void{
        $dbFeilds = '';
        $dbValues = '';
        foreach ($values as $key=>$value){
            $dbFeilds .= $key.",";
            $dbValues .= "'".$value."',";
        }
        $dbFeilds = rtrim($dbFeilds, ',');
        $dbValues = rtrim($dbValues, ',');

        $req = "INSERT INTO {$table} ({$dbFeilds}) VALUES ($dbValues)";

        self::dbConnect()->prepare($req)->execute();
    }

    public static function queryFA(string $table,string $where = "",string $order = ""):array{
        $req = "SELECT * FROM {$table}";
        if ($order){
            $req .= " ORDER BY {$order}";
        }
        if ($where){
            $req .= " WHERE {$where}";
        }
        return self::dbConnect()->query($req)->fetchAll();
    }

    public static function delete(string $table,int $id):void{
        $req = "DELETE FROM {$table} WHERE id=$id";
        self::genericQuery($req)->fetchAll();
    }

    public static function update(string $table, array $values,int $id):void{
        $req = "UPDATE {$table} SET ";
    }

}