<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quizz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/quiz.css">
</head>
<body class="d-flex align-items-center justify-content-center">
    <?php
        require_once('front-end/navbar.php');
        require_once('back-end/functions.php');

        if(empty($_GET["er"])==FALSE){ //si paramètre er dans l'url alors on import un fichier js qui récupère la valeur de er et affiche une alerte
            ?>
            <script defer id="jsParams" src="assets/scripts/alert.js" data-error="<?php echo($_GET["er"]); ?>"></script>
            <?php
        }
    ?>

    <main>
        <form action="back-end/quizResults.php" method="post">
            <table>
                <tr>
                    <?php
                        $data=getAllQuestions($connexion);
                        foreach($data as $value){
                    ?>
                        <td class="border-start border-top border-bottom border-dark ps-3"><?php echo($value[0]." - ".$value[1]);?></td>
                    <?php
                        if($value["IDTYPEQUESTION"]==1){
                            ?>
                                <td class="border border-dark d-flex justify-between p-2">
                                    <div class="d-flex flex-column">
                                        <label class="pe-2 ps-2" for="<?php echo($value["IDQUESTION"]); ?>">Oui</label>
                                        <input type="radio" name="<?php echo($value["IDQUESTION"]); ?>" value="1">
                                    </div>
                                    <div class="d-flex flex-column">
                                        <label class="pe-2 ps-2" for="<?php echo($value["IDQUESTION"]); ?>">Non</label>
                                        <input type="radio" name="<?php echo($value["IDQUESTION"]); ?>" value="0">
                                    </div>
                                </td>
                            <?php
                        }else{
                            ?>
                                <td class="border border-dark p-2">
                                    <label for="<?php echo($value["IDQUESTION"]); ?>">1</label>
                                    <input type="radio" name="<?php echo($value["IDQUESTION"]); ?>" value="0">
                                    <input type="radio" name="<?php echo($value["IDQUESTION"]); ?>" value="1">
                                    <input type="radio" name="<?php echo($value["IDQUESTION"]); ?>" value="2">
                                    <input type="radio" name="<?php echo($value["IDQUESTION"]); ?>" value="3">
                                    <input type="radio" name="<?php echo($value["IDQUESTION"]); ?>" value="4">
                                    <label for="<?php echo($value["IDQUESTION"]); ?>">5</label>
                                </td>
                            <?php
                        }
                    ?>
                </tr>
                    <?php
                        }
                    ?>
            </table>
            <button type="submit" class="btn btn-primary mt-5">Envoyer</button>
        </form>
    </main>
</body>
</html>
