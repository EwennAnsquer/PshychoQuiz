<?php 
    session_start();
    
    if(empty($_SESSION["id"])){
        header("location:../accueil.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>
    <?php

        include_once('front-end/admin_nav.php');

    ?>

    <div class="main d-flex flex-row w-100">
        <?php include_once('front-end/dashboard.php'); ?>
        <section id="mainSection">
            <div id="test" data-chart="truc"></div>

            <canvas id="barcanva" data-homme="60" data-femme="200" data-autre="60" aria-label="chart" role="img"></canvas>
        </section>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
    <script src="script/stats.js"></script>
</body>
</html>