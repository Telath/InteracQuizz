<?php require_once './webfiles/app/views/layouts/header.php'; ?>
    <form action="<?php UserController::userConnexion();?>" method="POST">
        <div><input type="text" name="mail" placeholder="Mail"></div>
        <div><input type="password" name="motdepasse" placeholder="Mot de passe"></div>
        <div><input type="submit" value="Connexion"></div>
    </form>
<?php require_once './webfiles/app/views/layouts/footer.php'; ?>