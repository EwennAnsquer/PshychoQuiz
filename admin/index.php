<?php 
    session_start(); 
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
    <link rel="stylesheet" href="css/button.css">
</head>
<body class="d-flex justify-content-center align-items-center h-100">
    <?php
        require_once('../front-end/navbar.php');

        if(empty($_GET["er"])==FALSE){
            ?>
            <script defer id="jsParams" src="scripts/alert.js" data-error="<?php echo($_GET["er"]); ?>"></script>
            <?php
        }
    ?>

    <form class="w-25" action="back-end/login.php" method="post">
        <!-- Email input -->
        <div class="form-outline mb-4">
            <label class="form-label" for="idInput">Identifiant</label>
            <input type="text" id="idInput" class="form-control" name="id"/>
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4">
            <label class="form-label" for="passwordInput">Mot de passe</label>
            <input type="password" id="passwordInput" class="form-control" name="password"/>
        </div>

        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block mb-4 border-0">Connexion</button>
    </form>
</body>
</html>