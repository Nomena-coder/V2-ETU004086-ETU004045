<?php

    include("../inc/function.php");
    session_start();
    $page = isset($_GET['p']) ? $_GET['p'] : null;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <header>
        <nav class="bg-light p-2 navbar bg-body-tertiary">
            <a href="modal.php?page=liste" class="navbar-brand ">
                <h1>Imena</h1>
            </a>
            <div class="ms-auto me-3">
                <?php echo $page != 'index' && $page != 'create' ? 'Connecte en tant que <b>'.$_SESSION['user']['nom'] .'</b>' : '' ?>
            </div>
        </nav>
    </header>
    <main>
        <?php 
            if($page != null) {
                include($page.".php"); 
            }
        ?>
    </main>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>