<?php

    session_start();
    include("../inc/function.php");
    $email = $_POST['email'];
    $pwd = $_POST['password'];
    $info = getLoginInfo($email, $pwd);
    if($info == NULL) {
        header("Location:modal.php?p=index&error=1");
        exit();
    }
    else{
        $_SESSION['user'] = $info;
        header("Location:modal.php?p=list");
    }

?>