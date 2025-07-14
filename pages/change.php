
<h1 class="text-start text-black">Voulez vous changer ? </h1>
    <hr class="m-5">

    <form action="" method="get">
        <input type="number" name="andro" id="">
        <input type="hidden" name="hidden" value="<?php echo $_GET['idObjet'];?>">
        
        <a href="modal.php?p=list&jour=<?php echo $_GET['andro'];?>">
            <button class="btn btn-info col-2 mt-3" type="button">Valid</button>
        </a>
    </form>
    