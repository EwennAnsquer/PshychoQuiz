<?php
    require_once('functions.php');

    $questions=getAllQuestions($connexion);

    if(ifAllQuestionsAnswered($questions,$connexion)){
        $idLastSonde=selectLastSonde($connexion)["IDSONDE"];

        foreach($_POST as $key=>$value){
            $data=$questions[$key-1];
            echo "$key=$value <br>";

            if($data["IDTYPEQUESTION"]==1){
                echo("Question fermee <br>");
                $scorefermee=selectScoreFerme($data["IDQUESTION"],$connexion); //res puis dev
                $rep=selectRepQuestion($data["IDQUESTION"],$connexion);
                $goodValue=selectGoodAnswerValue($scorefermee);
                $badValue=selectBadAnswerValue($scorefermee);

                if($value==$rep){
                    // echo("bonne reponse | +$goodValue[0] en $goodValue[1] <br>");
                    if($goodValue[1]=="res"){
                        insertIntoReponseAssociee($data["IDQUESTION"],$idLastSonde,$goodValue[0],0,$connexion);
                    }else{
                        insertIntoReponseAssociee($data["IDQUESTION"],$idLastSonde,0,$goodValue[0],$connexion);
                    }
                }else{
                    // echo("mauvaise reponse | +$badValue[0] en $badValue[1] <br>");
                    if($badValue[1]=="res"){
                        insertIntoReponseAssociee($data["IDQUESTION"],$idLastSonde,$badValue[0],0,$connexion);
                    }else{
                        insertIntoReponseAssociee($data["IDQUESTION"],$idLastSonde,0,$badValue[0],$connexion);
                    }
                }

            }else if($data["IDTYPEQUESTION"]==2){
                echo("Question echelle <br>");
                $coeff=selectScoreEchelle($data["IDQUESTION"],$connexion);
                $resultatDev=$coeff[0]*$value;
                $resultatRes=$coeff[1]*$value;
                insertIntoReponseAssociee($data["IDQUESTION"],$idLastSonde,$resultatRes,$resultatDev,$connexion);
            }
        }
        header("location:../resultat.php");
    }else{
        // header("location:../quiz.php?er=1");
    }
?>