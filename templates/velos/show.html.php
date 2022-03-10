<hr>
    <h2><?=$velo->getModele() ?></h2>

    <img src="<?=$velo->getImage() ?>" alt="" style="max-width: 300px">

    <form action="?type=velo&action=suppr" method="post">

    <br>

    <button type ="submit" name="id" value="<?=$velo->getId() ?>">Supprimer ce vélo</button>

    </form>

    <br>
    <a href="?type=velo&action=change&id=<?=$velo->getId() ?>" class="btn btn-warning">Modifier</a>

<a href="?type=velo&action=index" class="btn btn-secondary">Retour aux velos</a>
    <hr>

        <form action="?type=voyage&action=new" method="post">

            <div class="form-group">
                <input type="text" placeholder="Description du voyage" name="description" id="">
            </div>

            <div class="form-group">
                <input type="text" placeholder="Image du voyage" name="image" id="">
            </div>

            <div class="form-group">
                <input type="hidden" name="veloId" value="<?=$velo->getId() ?>">
            </div>

            <div class="form-group">
                <button class="btn btn-success" type="submit">Poster</button>
            </div>
        </form>

    <?php foreach($velo->getVoyage() as $voyage ){ ?> 
        
        <hr>

        <p><?= $voyage->getDescription() ?></p>
        <img src="<?=$voyage->getImage()?>" alt="" style="max-width: 150px">

        <form action="?type=voyage&action=suppr" method="post">
            <button name="id" value="<?= $voyage->getId() ?>" class="btn btn-danger" type="submit">Supprimer</button>
        </form>

        <a href="?type=voyage&action=change&id=<?=$voyage->getId()?>" class="btn bt-warning">Modifier</a>
        <hr>
             
    <?php } ?>