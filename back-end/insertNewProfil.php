<?php

    session_start();

    include_once('functions.php');

    if($_GET['sex']!="" && $_GET['fil']!=""){
        $sex=$_GET['sex'];
        $fil=$_GET['fil'];

        insertNewProfil($fil,$sex,$connexion);
        
        $_SESSION["IdSonde"]=selectLastSonde($connexion)["IDSONDE"];

        header('location:../quiz.php');
    }else{
        header("location:../accueil.php?er=2");
    }

?>