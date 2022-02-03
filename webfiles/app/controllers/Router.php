<?php 

    $url = $_GET["action"];
    $vue = explode("/", $url);

    require_once Config::webPath()["controller"]."Controller.php";
    Controller::render($vue[0]);