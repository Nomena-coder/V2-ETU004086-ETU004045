<?php

    include("../inc/function.php");
    session_start();
    $name = $_POST['name'];
    $email = $_POST['email'];
    $birth = $_POST['birth'];
    $password = $_POST['password'];
    $city = $_POST['city'];
    $genre = $_POST['genre'];
    $picture = $_FILES['picture'] != null ? $_FILES['picture'] : '';
    if(alreadyExists($email)) {
        header("Location:modal.php?p=create&error=1");
        exit();
    }
    insertUser($name, $email, $genre, $birth, $password, $city, $picture);
    header("Location:modal.php?p=index");

?>