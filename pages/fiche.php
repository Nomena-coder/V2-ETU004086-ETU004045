<?php

    $data = getInfoMembre($_GET['idMembre']);
    $categ = getCateg();

?>

<div class="container-fluid">
<div class="row py-4 justify-content m-auto rounded-4">
    <h1 class="text-start text-black">Personal Information </h1>
    <hr class="m-5">
    <?php foreach ($data as $value){?>
        <p>Name : <?= $value['nom'];?></p>
        <p>Date Of Birth : <?= $value['date_naissance'];?></p>
        <p>Gender : <?= $value['genre'];?></p>
        <p>City : <?= $value['ville'];?></p>
    <?php } ?>

    <h1 class="text-center text-black">Les Objets Regroupes par Categorie</h1>
    <?php foreach ($categ as $value){ 
        echo "<h1 class='mt-5'>".$value['nom_categorie']."</h1>";
        $list = getObjetCateg($value['id_categorie'], $_GET['idMembre']);
        foreach ($list as $values){
        $image = getImages($values['o_ido'])[0];
        ?> 
    <div class="card col-xl-2 col-lg-4 shadow rounded-2 bg-white mx-1 mt-4 position-relative" style="height:50vh">
    <div class="row rounded-2" height=250vh style="background-image:url(../assets/image-objets/<?= $image['nom_image']?>);background-repeat:no-repeat;background-size:cover;height:40vh; background-postition:center;">

        </div>
        <div class="text-left p-2">
            Categorie : <?php echo $values['nom_categorie']; ?>
            <h5 class="color-gray"><?= $values['nom_objet'];?></h5>
            <div class="d-flex">
                <h6 class="text-secondary">
                    <?php foreach ($data as $value){?>
                        <?= $value['nom']?>
                    <?php }?>
                </h6>
            </div>
            
        </div>
        <?php echo isOnEmprunt($values['o_ido']);?>
    </div>
<?php }} ?>
</div>
</div>