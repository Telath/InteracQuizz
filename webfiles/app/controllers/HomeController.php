<?php

namespace webfiles\app\controllers;

use webfiles\app\controllers\Controller;
/* use webfiles\app\models\Model; */

    class HomeController extends Controller{

        public static function index(){
            self::render("home");
        }

    }