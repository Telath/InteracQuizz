<?php require_once './webfiles/app/views/layouts/header.php'; ?>
<div class="quizzListe">
<?php
foreach ($quizzList as $quizz){ ?>
    <div class="quizz">
        <a href="/quizz/<?= $quizz['nom'] ?>/1"><?= $quizz["nom"] ?></a>
    </div>
<?php } ?>
</div>
<?php require_once './webfiles/app/views/layouts/footer.php'; ?>
