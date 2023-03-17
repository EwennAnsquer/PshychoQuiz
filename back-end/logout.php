<?php
    session_start();

    if(isset($_SESSION['TotalPoints'])) {
        session_destroy();
    }

    header("location:../accueil.php");
?>