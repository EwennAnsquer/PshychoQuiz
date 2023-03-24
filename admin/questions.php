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
    <title>Accueil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/button.css">
    <link rel="stylesheet" href="css/questions.css">
</head>
<body>
    <?php
        include_once('front-end/admin_nav.php');
        require_once('../back-end/functions.php');
    ?>

    <div class="main d-flex flex-row w-100">
        <?php include_once('front-end/dashboard.php'); ?>
        <section id="mainSection">
            <div class="d-flex justify-content-center align-items-center">
                <h1>Questions</h1>
            </div>
            <div>
                <button class="btn m-2">Ajouter Une question</button>
            </div>
            <div class="d-flex justify-content-center align-items-center">
                <table>
                    <tr class="d-flex flex-row w-100">
                        <td class="d-flex justify-content-center align-items-center border border-dark idQuestion">ID</td>
                        <td class="d-flex justify-content-left align-items-center border border-dark libQuestion">Libelle</td>
                        <td class="d-flex justify-content-center align-items-center border border-dark enjeuQuestion">Enjeu</td>
                        <td class="d-flex justify-content-center align-items-center border border-dark ps-e pe-2 typeQuestion">Type de Question</td>
                        <td class="d-flex justify-content-center align-items-center border border-dark ps-e pe-2 text-center scoreQuestion">Score<br>Dev</td>
                        <td class="d-flex justify-content-center align-items-center border border-dark ps-e pe-2 text-center scoreQuestion">Score<br>Res</td>
                        <td class="d-flex justify-content-center align-items-center border border-dark">
                            <button class="btn hidden" name="id" value="">Modifier</button>
                        </td>
                        <td class="d-flex justify-content-center align-items-center border border-dark">
                            <button class="btn hidden" name="id" value="">Supprimer</button>
                        </td>
                    </tr>
                    <?php 
                        $dataQuestion=getAllQuestions($connexion);
                        foreach($dataQuestion as $value){
                    ?>
                    <tr class="d-flex flex-row w-100">
                        <td class="d-flex justify-content-center align-items-center border border-dark idQuestion"><?php echo($value[0]);?></td>
                        <td class="d-flex justify-content-left align-items-center border border-dark libQuestion"><?php echo($value[1]);?></td>
                        <td class="d-flex justify-content-center align-items-center border border-dark enjeuQuestion"><?php echo($value[2]);?></td>
                        <?php 
                            if($value[3]==1){
                                $typeQuestion="Fermée";
                                $score=selectScoreFerme($value[0],$connexion);
                                $scoreRes=$score[0];
                                $scoreDev=$score[1];
                            }else{
                                $typeQuestion="Échelle";
                                $score=selectScoreEchelle($value[0],$connexion);
                                $scoreRes=$score[0];
                                $scoreDev=$score[1];
                            }
                        ?>
                        <td class="d-flex justify-content-center align-items-center border border-dark ps-2 pe-2 typeQuestion"><?php echo($typeQuestion); ?></td>
                        <td class="d-flex justify-content-center align-items-center border border-dark ps-e pe-2 scoreQuestion"><?php echo($scoreDev); ?></td>
                        <td class="d-flex justify-content-center align-items-center border border-dark ps-e pe-2 scoreQuestion"><?php echo($scoreRes); ?></td>
                        <td class="border border-dark">
                            <form action="back-end/ModifierQuestion.php" method="post">
                                <button type="submit" class="btn" name="id" value="<?php echo($value[0]); ?>">Modifier</button>
                            </form>
                        </td>
                        <td class="border border-dark">
                            <form action="back-end/SupprimerQuestion.php" method="post">
                                <button type="submit" class="btn" name="id" value="<?php echo($value[0]); ?>">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                    <?php
                        }
                    ?>
                </table>
            </div>
        </section>
    </div>
</body>
</html>