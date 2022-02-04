<?php 
    echo "Homepage view";
    require_once "C:\laragon\www\InteracQuizz\webfiles\app\controllers\UserController.php";
    
?>

<?php include_once 'header.php'; ?>

    <body>
        <h2>Connectez-vous</h2>
            <form action="<?php UserController::userConnexion();?>" method="POST">
                <div><input type="text" name="mail" placeholder="Mail"></div>
                <div><input type="password" name="motdepasse" placeholder="Mot de passe"></div>
                <div><input type="submit" value="Connexion"></div>
            </form>
        
        <h2>Inscrivez-vous</h2>
            <form action="<?php UserController::userRegister();?>" method="POST">
                <div><input type="text" name="nom" placeholder="Votre nom :"></div>
                <div><input type="text" name="prenom" placeholder="Votre prénom :"></div>
                <div><input type="mail" name="mail" placeholder="Votre mail :"></div>
                <div><input type="password" name="motdepasse" placeholder="Votre Mot de passe :"></div>
                <div><input type="submit" value="Inscription"></div>
            </form>


<?php include_once 'footer.php'; ?>
