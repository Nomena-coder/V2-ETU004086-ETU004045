<?php

    if(!isset($_SESSION['user'])) {
        header("Location:modal.php?p=index");
        exit;
    }
    $list = getList(isset($_POST['filter']) ? $_POST['filter'] : null);
    $categories = getCategories();

?>

<div class="container-fluid px-4">
    <h1 class="text-center">LISTE</h1>
<form action="" method="post" class="col-2 mb-4 m-auto">
    <select name="filter" id="" class="form-select">
        <?php foreach($categories as $value) { ?>
            <option value="<?php echo $value['id_categorie']; ?>" <?php echo isset($_POST['filter']) && $value['id_categorie'] == $_POST['filter'] ? 'selected' : '' ?>><?php echo $value['nom_categorie']; ?></option>
        <?php } ?>
    </select>
    <button type="submit" class="btn col-12 btn-success mt-3">
        Filter
    </button>
    <a href="modal.php?p=addobject">
        <button class="btn btn-info col-12 mt-3" type="button">Ajouter un nouveau objet</button>
    </a>
</form>
<div class="row d-flex justify-content-between border" style="height=700vh">

<?php foreach ($list as $value){ ?> 
    <div class="card col-xl-2 col-lg-4 shadow rounded-2 bg-white mx-1 mt-4 position-relative" style="height:50vh">
        <div class="row rounded-2" height=250vh style="background-image:url(../assets/image-objets/<?= $value['o_img']?>);background-repeat:no-repeat;background-size:cover;height:40vh">

        </div>
        <div class="text-left p-2">
            Categorie : <?php echo $value['nom_categorie']; ?>
            <h5 class="color-gray"><?= $value['nom_objet'];?></h5>
            <div class="d-flex">
                <h6 class="text-secondary"><?= $value['nom']?></h6>
            </div>
            
        </div>
        <?php echo isOnEmprunt($value['o_ido']);?>
    </div>
<?php } ?>
</div>
<!--  -->
</div>