<?php require_once './webfiles/app/views/layouts/header.php'; ?>
    <form action="<?php UserController::userRegister();?>" method="POST">
        <div><input type="text" name="nom" placeholder="Votre nom :"></div>
        <div><input type="text" name="prenom" placeholder="Votre prénom :"></div>
        <div><input type="mail" name="mail" placeholder="Votre mail :"></div>
        <div><input type="password" name="motdepasse" placeholder="Votre Mot de passe :"></div>
        <div><input type="submit" value="Inscription"></div>
    </form>
<?php require_once './webfiles/app/views/layouts/footer.php'; ?>