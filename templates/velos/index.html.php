<h1>Page des vélos</h1>
<a href="?type=velo&action=new" class="btn btn-success">Créer un velo</a>


<?php foreach($velos as $velo){ ?>

    <hr>
    <h2> <?=$velo->getModele()?> </h2>
    <img src="<?=$velo->getImage()?>" alt="" style="max-width: 250px;">

    <a href="?type=velo&action=show&id=<?=$velo->getId()?>" class="btn btn-primary">Voir ce vélo</a>

    <hr>
    <?php } ?>