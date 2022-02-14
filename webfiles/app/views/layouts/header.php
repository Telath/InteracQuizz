<?php use webfiles\config\Config;
$protocol = stripos($_SERVER['SERVER_PROTOCOL'],'https') === 0 ? 'https://' : 'http://';
if (!isset($title)){
    $title = "interacQuizz";
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Bienvenue sur la page d'accueil d'InteracQuizz">
    <link rel="stylesheet" href="<?= $protocol.$_SERVER["SERVER_NAME"]."/".Config::assetsPath()["css"] ?>/style.css">
    <title><?php echo $title ?></title>
</head>
<body>
    <header>
        <a href="/logout">logout</a>

    </header>