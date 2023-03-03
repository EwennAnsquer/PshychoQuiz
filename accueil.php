<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/accueil.css">
</head>
<!---jadorelesziziz-->
<body class="d-flex justify-content-center align-items-center">
    <?php 
    
        include_once("front-end/navbar.php"); 
        include_once("back-end/functions.php");

        if(empty($_GET["er"])==FALSE){
            ?>
            <script defer id="jsParams" src="assets/scripts/alert.js" data-error="<?php echo($_GET["er"]); ?>"></script>
            <?php
        }

    ?>

    <form class="accueilForm" action="back-end/insertNewProfil.php" method="get">
        <label for="testselect">Choisir votre sexe:</label>
        <select class="form-select mb-5" aria-label="Default select example" name="sex">
            <option selected value="">Choisir un sexe</option>
            <option value="M">Homme</option>
            <option value="F">Femme</option>
            <option value="N">Autre</option>
        </select>

        <label for="testselect">Choisir votre filière:</label>
        <select class="form-select mb-5" aria-label="Default select example" name="fil">
            <option selected value="">Choisir votre filière</option>
            <?php
                $dataOrigine=selectAllorigine($connexion);
                $idOrigine=1;

                foreach($dataOrigine as $value){
                    ?>
                        <option value="<?php echo($idOrigine) ?>"> <?php echo($value[0]) ?></option>
                    <?php
                    $idOrigine=$idOrigine+1;
                }
            ?>
        </select>
        <button type="submit" class="btn btn-primary startQuiz">Démarrer le Quiz</button>
    </form>
</body>
</html>