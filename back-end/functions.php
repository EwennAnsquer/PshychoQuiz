<?php

    require_once("connexion.php");

    function selectAllorigine($connexion){
        $requete = $connexion->prepare('SELECT NOM from origine');
        $requete->execute();
        $data = $requete->fetchAll();
        return $data;
    }

    function insertNewProfil($origine,$sexe,$connexion){
        $now=idate("Y");
        $requete = $connexion->prepare("INSERT INTO `sonde` VALUES ('',:origine,:date,:sexe)");
        $requete->bindValue(':date', $now, PDO::PARAM_INT);
        $requete->bindValue(':origine', $origine, PDO::PARAM_INT);
        $requete->bindValue(':sexe', $sexe, PDO::PARAM_INT);
        $requete->execute();
    }

?>