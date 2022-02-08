<h1>Users default view</h1>
<h2>Ici sont affichés tous les users regroupés par promotion</h2>
<h3>Chaque promotion est stockée au sein d'un tableau.</h3>
<h3>Ces promotions sont affichées des plus récentes aux plus anciennes</h3>

<ul>
    <?php foreach($donnees as $single):?>
        <li><a href="/user/<?= $single['id'] ?>"><?= $single["nom"]; ?></a></li>
    <?php endforeach; ?>
</ul>