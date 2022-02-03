<?php

    /* Extract what's inside the JSON config file */
/*     $settings = file_get_contents("settings.json");
    $settings = json_decode($settings);

    var_dump($settings); */

    require_once "webfiles/app/models/GlobalModel.php";

GlobalModel::delete('users', "1");