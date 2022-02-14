<?php

use webfiles\app\controllers\LoginController;

require_once './webfiles/app/views/layouts/header.php';
echo $error;
?>
    <form action="<?php LoginController::index();?>" method="POST" class="center">
        <div><input type="text" name="mail" placeholder="Mail"></div>
        <div><input type="password" name="motdepasse" placeholder="Mot de passe"></div>
        <div><input type="submit" value="Connexion"></div>
    </form>
<?php require_once './webfiles/app/views/layouts/footer.php'; ?>