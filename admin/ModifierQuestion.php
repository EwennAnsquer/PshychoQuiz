<?php

    session_start();
        
    if(empty($_SESSION["id"])){
        header("location:../accueil.php");
    }

    if(isset($_POST["id"])){
        $id=$_POST["id"];
    }else{
        include_once("../back-end/functions.php");
        if(isset($_POST["idUpdate"]) and isset($_POST["lib"]) and isset($_POST["type"]) and isset($_POST["enjeu"]) and isset($_POST["rep"]) and isset($_POST["scoreRes"]) and isset($_POST["scoreDev"])){
            if(filter_var($_POST["idUpdate"],FILTER_VALIDATE_INT) and filter_var($_POST["scoreRes"],FILTER_VALIDATE_INT) and filter_var($_POST["scoreDev"],FILTER_VALIDATE_INT)){
                $id=$_POST["idUpdate"];
                $lib=$_POST["lib"];
                $type=$_POST["type"];
                $enjeu=$_POST["enjeu"];
                $rep=$_POST["rep"];
                $scoreRes=$_POST["scoreRes"];
                $scoreDev=$_POST["scoreDev"];

                $isScoreValid=ifExistScore($type,$rep,$scoreRes,$scoreDev,$connexion);

                // var_dump($isScoreValid);

                if($isScoreValid==null){
                    insertIntoScore($type,$scoreRes,$scoreDev,$rep,$connexion);
                    $idScore=selectLastScore($type,$connexion)[0];
                }else{
                    $idScore=$isScoreValid[0]["IDSCOREF"];
                }

                updateQuestion($id,$lib,$type,$enjeu,$idScore,$connexion);
                header("location:questions.php");
            }else{
                header("location:questions.php?er=3");
            }
        }else{
            header("location:questions.php");
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Question</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/button.css">
    <link rel="stylesheet" href="css/editQuestion.css">
</head>
<body>
    <?php
        include_once("front-end/admin_nav.php");
        include_once("../back-end/functions.php");
        $dataQuestion=getQuestion($id,$connexion);
        $lib=htmlspecialchars($dataQuestion[1]);
        if($dataQuestion[3]==1){
            $score=selectScoreFerme($id,$connexion);
        }else{
            $score=selectScoreEchelle($id,$connexion);
        }
    ?>
    <form action="" method="post">
        <input type="text" name="idUpdate" class="d-none" value="<?php echo($id);?>">
        <div class="mb-3">
            <label for="libelleInput" class="form-label">Libelle</label>
            <input type="text" name="lib" class="form-control" id="libelleInput" value="<?php echo($lib);?>">
        </div>
        <label for="typeInput">Choisir votre type de question:</label>
        <select class="form-select mb-5" id="typeInput" aria-label="Default select example" name="type">
            <?php
                if($dataQuestion[3]==1){
                    ?>
                    <option value="1" selected>Question Fermée</option>
                    <option value="2">Question Echelle</option>
                    <?php
                }else{
                    ?>
                    <option value="1">Question Fermée</option>
                    <option value="2"selected>Question Echelle</option>
                    <?php
                }
            ?>
        </select>
        <div class="mb-3">
            <label for="enjeuInput" class="form-label">Enjeu</label>
            <input name="enjeu" type="text" class="form-control" id="enjeuInput" value="<?php echo($dataQuestion[2]); ?>">
        </div>
        <div class="mb-3" id="repDiv">
            <?php
                if($dataQuestion[3]==1){
                    $rep=selectRepQuestion($id,$connexion);
                }else{
                    $rep=1;
                }
            ?>
            <label for="repInput" class="form-label">Rep</label>
            <select class="form-select mb-5" id="repInput" aria-label="Default select example" name="rep">
                <?php
                    if($rep==1){
                        ?>
                        <option value="1" selected>1</option>
                        <option value="2">2</option>
                        <?php
                    }else{
                        ?>
                        <option value="1">1</option>
                        <option value="2"selected>2</option>
                        <?php
                    }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="scoreResInput" class="form-label">Score Réseau</label>
            <input name="scoreRes" type="text" class="form-control" id="scoreResInput" value="<?php echo($score[0]); ?>">
        </div>
        <div class="mb-3">
            <label for="scoreDevInput" class="form-label">Score Développement</label>
            <input name="scoreDev" type="text" class="form-control" id="scoreDevInput" value="<?php echo($score[1]); ?>">
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer les changements</button>
        <button class="btn btn-primary">
            <a href="questions.php">Annuler</a>
        </button>
    </form>
    <script src="scripts/ModifierQuestion.js"></script>
</body>
</html>