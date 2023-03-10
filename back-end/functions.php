<?php

    require_once("connexion.php");

    function selectAllorigine($connexion){
        $requete = $connexion->prepare('SELECT NOM from origine');
        $requete->execute();
        $data = $requete->fetchAll();
        return $data;
    }

    function insertNewProfil($origine,$sexe,$connexion){
        $now=idate("Y");
        $requete = $connexion->prepare("INSERT INTO `sonde`(`IDORIGINE`, `ANNEE`, `SEXE`) VALUES (:origine,:date,:sexe)");
        $requete->bindValue(':date', $now, PDO::PARAM_INT);
        $requete->bindValue(':origine', $origine, PDO::PARAM_INT);
        $requete->bindValue(':sexe', $sexe, PDO::PARAM_STR);
        $requete->execute();
    }

    function getAllQuestions($connexion){
        $requete = $connexion->prepare('SELECT * FROM `question`');
        $requete->execute();
        $data = $requete->fetchAll();
        return $data;
    }

    function selectNumberQuestion($connexion){
        $requete = $connexion->prepare('SELECT count(*) FROM `question`');
        $requete->execute();
        $data = $requete->fetchAll();
        return $data[0][0];
    }

    function ifAllQuestionsAnswered($data,$connexion){
        $i=0;
        $ok=FALSE;
        $nbQuestions = (int)selectNumberQuestion($connexion);
        while(($i != $nbQuestions) && (empty($_POST[$data[$i][0]])!=TRUE)){
            $i++;
        }
        if($i==$nbQuestions){
            $ok=TRUE;
        }
        return $ok;
    }

    function selectLastSonde($connexion){
        $requete = $connexion->prepare('SELECT * FROM sonde ORDER BY IDSONDE DESC LIMIT 1');
        $requete->execute();
        $data = $requete->fetchAll();
        return $data[0];
    }

    function selectScoreFerme($IDQUESTION,$connexion){
        $requete = $connexion->prepare('SELECT scorefres,scorefdev FROM `question` inner join scorefermee on question.IDSCOREFERMEE = scorefermee.IDSCOREF WHERE IDQUESTION=:idquestion');
        $requete->bindValue(':idquestion', $IDQUESTION, PDO::PARAM_INT);
        $requete->execute();
        $data = $requete->fetchAll();
        return $data[0];
    }


    function selectScoreEchelle($IDQUESTION,$connexion){
        $requete = $connexion->prepare('SELECT NBPTMULTRES, NBPTMULTDEV FROM question INNER JOIN scorech ON question.IDSCORECH = scorech.IDSCORECH WHERE IDQUESTION=:idquestion');
        $requete->bindValue(':idquestion', $IDQUESTION, PDO::PARAM_INT);
        $requete->execute();
        $data = $requete->fetchAll();
        return $data[0];
    }

    function ifAccountExist($id,$p,$connexion){
        $requete = $connexion->prepare('SELECT mdp FROM `admin` WHERE `identifiant`=:id');
        $requete->bindValue(':id', $id, PDO::PARAM_STR);
        $requete->execute();
        $data = $requete->fetchAll();
        if(empty($data) or password_verify($p,$data[0][0])==FALSE){
            return FALSE;
        }else{
            return TRUE;
        }
    }

    function selectRepQuestion($IDQUESTION,$connexion){
        $requete = $connexion->prepare('SELECT rep FROM `question` inner join scorefermee on question.IDSCOREFERMEE = scorefermee.IDSCOREF WHERE IDQUESTION=:idquestion');
        $requete->bindValue(':idquestion', $IDQUESTION, PDO::PARAM_INT);
        $requete->execute();
        $data = $requete->fetchAll();
        return $data[0][0];
    }

    //function selectCoeffQuestionEchelle($IDQUESTION,$connexion){ // pas bon
    //    $requete=$connexion->prepare('')
    //}

    function selectGoodAnswerValue($data){
        if($data[0]>$data[1]){
            return [$data[0],"res"];
        }else{
            return [$data[1],"dev"];
        }
    }

    function selectBadAnswerValue($data){
        if($data[0]<$data[1]){
            return [$data[0],"res"];
        }else{
            return [$data[1],"dev"];
        }
    }

    function insertIntoReponseAssociee($idquestion,$idsonde,$valeurRes,$valeurDev,$connexion){
        $requete = $connexion->prepare("INSERT INTO `reponseassociee`(`IDQUESTION`, `IDSONDE`, `VALEURRES`, `VALEURRDEV`) VALUES (:idquestion,:idsonde,:valeurRes,:valeurDev)");
        $requete->bindValue(':idquestion', $idquestion, PDO::PARAM_INT);
        $requete->bindValue(':idsonde', $idsonde, PDO::PARAM_INT);
        $requete->bindValue(':valeurRes', $valeurRes, PDO::PARAM_INT);
        $requete->bindValue(':valeurDev', $valeurDev, PDO::PARAM_INT);
        $requete->execute();
    }
<<<<<<< HEAD
    function résultataff($connexion){

        $reseau = 0;
        $reseauplus = 0;
        $reseaumoins = 0;
        $dev = 0;
        $devplus = 0;
        $devmoins = 0;
        $resultat = [];
        $requete = $connexion->prepare("SELECT VALEURRES, VALEURRDEV
        FROM reponseassociee
        WHERE IDSONDE = (SELECT MAX(IDSONDE) FROM reponseassociee) ");
        $requete->execute();
        $data = $requete->fetchAll();
        foreach($data as $res){
            $reseau += $res['VALEURRES'];
            if($res['VALEURRES'] >0){
                $reseauplus+= $res['VALEURRES'];

            }
            else
            {
                $reseaumoins+= ($res['VALEURRES']*-1);
            }


            $dev += $res['VALEURRDEV'];
            if($res['VALEURRDEV'] >0){
                $devplus+= $res['VALEURRDEV'];

            }
            else
            {
                $devmoins+= ($res['VALEURRDEV']*-1);
            }
        }
        if($reseau > 20 and $dev < 20){
            $décision = 3;
        }
        if($reseau > 20 and $dev < 20){
            $décision = 1;
        }
        else{
            $décision = 2;
        }
        
        $resultat = array($décision,$dev,$devplus,$devmoins,$reseau,$reseauplus,$reseaumoins);
        return $resultat;


        
    }

    function reqadminprofils($connexion){
        $reqFormulaire = "SELECT NOM,IDSONDE as ID,  sonde.IDORIGINE, ANNEE, SEXE FROM origine,sonde WHERE origine.IDORIGINE = sonde.IDORIGINE ORDER by IDSONDE";
        $profils = $connexion->prepare($reqFormulaire);
        $profils->execute();
        $profils_aff = $profils->fetchAll();
        
        return $profils_aff;

    }

    function supprimer_profil($connexion, $id){
        $req = "DELETE FROM origine WHERE IDORIGINE = $id ";
        $suppr = $connexion->prepare($req);
        $suppr->execute();
        $req = "DELETE FROM sonde WHERE IDORIGINE = $id ";
        $suppr = $connexion->prepare($req);
        $suppr->execute();
    }
=======
>>>>>>> c4698890bd23e4154eedff15fcd25e8c45417fc4
?>