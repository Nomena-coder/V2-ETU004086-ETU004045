<?php

    $categories = getCategories();

?>
<div class="container">
    <form action="traitement_addobject.php" method="post" class="col-4 m-auto" enctype="multipart/form-data">
        <label for="name">Nom de l'objet</label>
        <input type="text" name="name" id="name" class="form-control mb-4" required>
        <label for="category">Categorie de l'objet</label>
        <select name="category" id="category" class="form-select mb-4">
            <?php foreach($categories as $value) { ?>
                <option value="<?php echo $value['id_categorie']; ?>" <?php echo isset($_POST['filter']) && $value['id_categorie'] == $_POST['filter'] ? 'selected' : '' ?>><?php echo $value['nom_categorie']; ?></option>
            <?php } ?>
        </select>
        <label for="image">Images</label>
        <input type="file" name="file[]" id="image" class="form-control mb-4" multiple>
        <button type="submit" class="btn btn-success">Add</button>
    </form>
</div>