<?php
    use webfiles\config\Config;
    use webfiles\app\controllers\Router;
    
    require_once("webfiles/app/Autoload.php");
    Router::get(ltrim($_SERVER["REQUEST_URI"], '/'), "UserController");

?>



