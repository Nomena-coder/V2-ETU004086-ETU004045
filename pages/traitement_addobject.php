<?php

    include("../inc/function.php");
    session_start();
    $name = $_POST['name'];
    $category = $_POST['category'];
    $image = $_FILES['file'];
    $last_id = InsertObject($name, $category, $_SESSION['user']['id_membre']);
    $upDir = "../assets/image-objets/";
    $allowed = ["image/jpeg", "image/jpg", "image/png"];
    $maxSize = 10 * 1024 * 1024;
    $transformed = TransformImagesArray($image);
    foreach($transformed as $file) {
        if(TreatImage($upDir, $allowed, $maxSize, $file, "addobject") != "") {
            header(TreatImage($upDir, $allowed, $maxSize, $file, "addobject"));
            exit;
        } else {
            $current_name = pathinfo($file['name'], PATHINFO_FILENAME);
            $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
            $newname = $current_name . "_" . uniqid() . "." . $extension;
            move_uploaded_file($file['tmp_name'], $upDir . $newname);
            insertImage($last_id['id_objet'], $newname);
        }
        
    }
   header("Location:modal.php?p=list");

?>
