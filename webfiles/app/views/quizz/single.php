<h1><?= $Questions["intitule"] ?></h1>
<ul>
    <?php foreach($Answers as $single):?>
    <li><?= $single["contenu"] ?></li>
    <?php endforeach; ?>
</ul>