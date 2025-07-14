<?php

    require("connect.php");
    function getLoginInfo($email, $mdp) {
        $sql = "SELECT * FROM membre WHERE email = '%s' AND mdp = '%s'";
        $sql = sprintf($sql , $email, $mdp);
        echo $sql;
        $result = mysqli_query(dbconnect(), $sql);
        return mysqli_fetch_assoc($result);
    }

    function alreadyExists($email) {
        $sql = "SELECT * FROM membre WHERE email = '%s'";
        $sql = sprintf($sql, $email);
        $result = mysqli_query(dbconnect(), $sql);
        $data = mysqli_fetch_assoc($result);
        return $data != null;
    }

    function insertUser($name, $email, $genre, $birth, $password, $city, $picture) {
        $sql = "INSERT INTO membre (nom, email, mdp, date_naissance, ville, genre, img)
        VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s')";
        $sql = sprintf($sql, $name, $email, $password, $birth, $city, $genre, $picture);
        mysqli_query(dbconnect(), $sql);
    }

    function getCategories() {
        $sql = "SELECT * FROM categorie_objet";
        $result = mysqli_query(dbconnect(), $sql);
        while($data[] = mysqli_fetch_assoc($result));
        unset($data[count($data)-1]);
        return $data;
    }

    function getList($idCategorie){
        $sql2 = $idCategorie == null ? '' : ' WHERE o_idc = '.$idCategorie;
        $sql= "SELECT * FROM v_objet_categorie".$sql2;
        $result = mysqli_query(dbconnect(), $sql);
        $data = [];
        while($data[] = mysqli_fetch_assoc($result));
        unset($data[count($data)-1]);
        return $data;
    }

    function isOnEmprunt($idObjet) {
        $sql = "SELECT * FROM emprunt WHERE id_objet = %s AND date_retour > CURDATE()";
        $sql = sprintf($sql, $idObjet);
        $result = mysqli_query(dbconnect(), $sql);
        $data = mysqli_fetch_assoc($result);
        return $data != null ? 'Emprunt jusqu\'a '.$data['date_retour'] : 'dispo';
    }

?>