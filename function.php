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

    function TransformImagesArray($array) {
        $ret = array();
        foreach($array as $key => $value) {
            for($i = 0; $i < count($value); $i++) {
                $ret[$i][$key] = $value[$i];
            }
        }
        return $ret;
    }
    function TreatImage($upDir, $allowed, $maxSize, $file, $currentDir) {
        if($file['error'] != UPLOAD_ERR_OK) {
            return "Location:modal.php?p=$currentDir&error=upload";
        }
        if($file['size'] > $maxSize) {
            return "Location:modal.php?p=$currentDir&error=size";
        }
        $fileInfo = finfo_open(FILEINFO_MIME_TYPE);
        $type = finfo_file($fileInfo, $file['tmp_name']);
        if(!in_array($type, $allowed)) {
            return "Location:modal.php?p=$currentDir&error=type";
        }
        return "";
    }
    function InsertObject($nom, $cat, $membre) {
        $sql = "INSERT INTO objet (nom_objet, id_categorie, id_membre) VALUES ('%s', %s, %s)";
        $sql = sprintf($sql, $nom, $cat, $membre);
        echo $sql;
        mysqli_query(dbconnect(), $sql);
        $id = mysqli_query(dbconnect(), "SELECT id_objet FROM objet ORDER BY id_objet DESC LIMIT 1");
        return mysqli_fetch_assoc($id);
    }
    function InsertImage($idObjet, $nomImage) {
        $sql = "INSERT INTO images_objet (id_objet, nom_image) VALUES (%s, '%s')";
        $sql = sprintf($sql, $idObjet, $nomImage);
        mysqli_query(dbconnect(), $sql);
    }

    function getImages($idObjet) {
        $sql = "SELECT * FROM images_objet WHERE id_objet = %s";
        $sql = sprintf($sql, $idObjet);
        $result = mysqli_query(dbconnect(), $sql);
        while($data[] = mysqli_fetch_assoc($result));
        unset($data[count($data)-1]);
        return $data;
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

    function getInfoMembre($idMembre){
        $sql = "SELECT * FROM membre WHERE id_membre = '%s'";
        $sql = sprintf($sql, $idMembre);
        $result = mysqli_query(dbconnect(), $sql);
        $data = [];
        while($data[] = mysqli_fetch_assoc($result));
        unset($data[count($data)-1]);
        return $data; 
    }

    function getCateg(){
        $sql = "SELECT * FROM categorie_objet";
        $result = mysqli_query(dbconnect(), $sql);
        $data = [];
        while($data[] = mysqli_fetch_assoc($result));
        unset($data[count($data)-1]);
        return $data; 
    }

    function getObjetCateg($idCategorie, $idMembre){
        $sql = "SELECT * FROM v_objet_categorie WHERE id_categorie = '%s' AND id_membre= '%s'";
        $sql = sprintf($sql, $idCategorie, $idMembre);
        $result = mysqli_query(dbconnect(), $sql);
        // echo $sql;
        $data = [];
        while($data[] = mysqli_fetch_assoc($result));
        unset($data[count($data)-1]);
        return $data;
    }

?>
