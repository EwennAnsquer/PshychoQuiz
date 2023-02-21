<?php

    session_start();

    if($_POST["id"]!="" && $_POST["password"]!=""){
        $id=$_POST["id"];
        $password=$_POST["password"];
        // echo $id." ".$password."<br>";

        include_once('../../back-end/functions.php');

        if(ifAccountExist($id,$password,$connexion)){

            $_SESSION["id"]=$id;

            header("location:../statistiques.php");
        }else{
            header("location:../index.php");
        }

    }else{
        header("location:../index.php");
    }

?>