<?php 

    namespace webfiles\app\controllers;

    class Router{

        private static $ctrlNameSpace = "webfiles\app\controllers\\";

        // Methode qui permets de d'afficher une vue particulière
         
        public static function get(string $uri, string $ctrlName):void{

            $controllerCall = self::$ctrlNameSpace."{$ctrlName}::render";
            $controllerCall($uri);
        }

        public static function start(){
            $url = $_SERVER["REQUEST_URI"];
            $vue = explode("/", $url);
            var_dump($vue);
        }
    }

/*     

    var_dump($vue); */

    // Redirige vers le controller spécifique //
/*     Controller::render($vue[0]); */

    /* Route::get('/pokedex', 'PokedexController@displayAllPokemons')->name('pokedex'); */
