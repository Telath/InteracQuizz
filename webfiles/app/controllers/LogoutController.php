<?php

namespace webfiles\app\controllers;

class LogoutController
{
    public static function index(){
        session_destroy();
        header('Location: /login');
    }
}