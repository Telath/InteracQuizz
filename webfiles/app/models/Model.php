<?php 
namespace webfiles\app\models;

abstract class Model{


    public static function queryTest($query){
        if ( $query === false ){
            echo "404";
            die;
        }
    }


}