<?php

    function dbconnect(){
        $db = mysqli_connect("localhost", "root", "", "product");
        if(!$db){
            return "Misy zavatra tsy mety ato ohhhhhhhh (connect.php)";
        }
        return $db;
    }


?>