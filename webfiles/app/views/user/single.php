<?php require_once './webfiles/app/views/layouts/header.php'; ?>
<h1>Affichage du user <?php echo $userData["nom"]." ".$userData["prenom"]; ?> </h1>
<div class="allQuizz">
<?php
for ($i = 0; $i < count($quizz); $i++){ ?>
    <div class="quizz">
        <p><?= $quizz[$i]["nom"] ?></p>
        <p><?= $quizz[$i]["note"] ?></p>
    </div>
<?php } ?>
</div>
<?php require_once './webfiles/app/views/layouts/footer.php'; ?>