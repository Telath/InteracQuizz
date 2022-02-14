<?php
use webfiles\app\controllers\QuizzController;

$lien = explode("/", ltrim($_SERVER["REQUEST_URI"], '/'));
$id = $lien[array_key_last($lien)];
$id = intval($id)+1;
$quizz = $lien[array_key_last($lien)-1];
?>
<h1><?= $Questions["intitule"] ?></h1>
<form action="<?php QuizzController::find($quizz, $id) ?>" method="post">
    <?php foreach($Answers as $single):?>
        <label for="<?= $single['contenu'] ?>"><input type="checkbox" id="<?= $single['contenu'] ?>"><?= $single["contenu"] ?></label>
    <?php endforeach; ?>
    <input type="submit">
</form>