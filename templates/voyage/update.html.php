<form action="?type=voyage&action=change" method="post">

    <div class="form-group">
        <input type="text" placeholder="Description du voyage" name="description" value="<?=$voyage->getDescription() ?>" id="">
    </div>

    <div class="form-group">
        <input type="text" placeholder="Image du voyage" name="image" value="<?=$voyage->getImage() ?>" id="">
    </div>

    <div class="form-group">
        <input type="hidden" name="id" value="<?=$voyage->getId() ?>">
    </div>

    <div class="form-group">      
        <button class="btn btn-success" type="submit">Modifier</button>
    </div>
</form>