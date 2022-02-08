<?php require_once './webfiles/app/views/layouts/header.php'; ?>
<div class="quizzListe">
<?php
foreach ($donnees as $quizz){ ?>
    <div class="quizz">
        <a href="/quizz/<?= $quizz['techno']['nom'] ?>"><?= $quizz["nom"] ?></a>
    </div>
<?php } ?>
</div>
<?php require_once './webfiles/app/views/layouts/footer.php'; ?>