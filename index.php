<?php

    /* Extract what's inside the JSON config file */
    $settings = file_get_contents("settings.json");
    $settings = json_decode($settings);

    var_dump($settings);