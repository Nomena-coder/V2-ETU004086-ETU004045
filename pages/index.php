
    <div class="container vh-100">
    <h1 class="text-center mt-3">Connexion</h1>
        <div class="row">
            <?php
                if(isset($_GET['error'])){
                    echo '<div class="alert text-center alert-danger alert-dismissible fade show" role="alert">
        <strong>Error !</strong> Invalid connexion identifiant!
        <button type="button" data-bs-dismiss="alert" class="btn-close"></button>
    </div>';
                }
            ?>
        <form action="traitement_login.php" method="post" class="col-6 m-auto">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control mb-4">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control mb-4">
            <button type="submit" class="btn btn-success mb-2">Login</button>
            <br>
            <a href="modal.php?p=create" class="">Don't you have an account? Sign up...</a>
        </form>
        </div>
    </div>