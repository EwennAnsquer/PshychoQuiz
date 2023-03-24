<?php
    session_start();
    if(isset($_SESSION["TotalPoints"])){
        header("location:resultat.php");
    }
    require_once('functions.php');

    $questions=getAllQuestions($connexion);

    if(ifAllQuestionsAnswered($questions,$connexion)){
        foreach($_POST as $key=>$value){ //boucle sur chaque POST envoyer de la page QUIZZ
            $data=$questions[$key-1];
            echo "$key=$value <br>";

            if($data["IDTYPEQUESTION"]==1){
                echo("Question fermee <br>");
                $rep=selectRepQuestion($data["IDQUESTION"],$connexion);
                if($rep==1 && $value==1){
                    $requeteRep=selectScoreFerme($data["IDQUESTION"],$connexion);
                    $resDev=$requeteRep[0];
                    $resRes=$requeteRep[1];
                    insertIntoReponseAssociee($data["IDQUESTION"],$idLastSonde,$resRes,$resDev,$connexion);
                }else if($rep==2 && $value==2){
                    $requeteRep=selectScoreFerme($data["IDQUESTION"],$connexion);
                    $resDev=$requeteRep[0];
                    $resRes=$requeteRep[1];
                    insertIntoReponseAssociee($data["IDQUESTION"],$idLastSonde,$resRes,$resDev,$connexion);
                }

                }else if($data["IDTYPEQUESTION"]==2){
                    echo("Question echelle <br>");
                    $coeff=selectScoreEchelle($data["IDQUESTION"],$connexion);
                    $resultatDev=$coeff[0]*$value;
                    $resultatRes=$coeff[1]*$value;
                    insertIntoReponseAssociee($data["IDQUESTION"],$_SESSION["IdSonde"],$resultatRes,$resultatDev,$connexion);
                }
            }
        }
        header("location:../resultat.php");
    }else{
        header("location:../quiz.php?er=1");
    }
?>