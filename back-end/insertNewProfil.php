<?php

    include_once('functions.php');

    if($_GET['sex']!="" && $_GET['fil']!=""){
        $sex=$_GET['sex'];
        $fil=$_GET['fil'];

        insertNewProfil($fil,$sex,$connexion);

        header('location:../quiz.php');
    }else{
        header("location:../accueil.php");
    }

?>