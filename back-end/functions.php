<?php

    require_once("connexion.php");

    function selectAllorigine($connexion){ //select toutes les origines pour accueil
        $requete = $connexion->prepare('SELECT NOM from origine');
        $requete->execute();
        $data = $requete->fetchAll();
        return $data;
    }

    function insertNewProfil($origine,$sexe,$connexion){ //insert un nouveau profil dans sonde
        $now=idate("Y");
        $requete = $connexion->prepare("INSERT INTO `sonde`(`IDORIGINE`, `ANNEE`, `SEXE`) VALUES (:origine,:date,:sexe)");
        $requete->bindValue(':date', $now, PDO::PARAM_INT);
        $requete->bindValue(':origine', $origine, PDO::PARAM_INT);
        $requete->bindValue(':sexe', $sexe, PDO::PARAM_STR);
        $requete->execute();
    }

    function getAllQuestions($connexion){ //select toutes les questions
        $requete = $connexion->prepare('SELECT * FROM `question`');
        $requete->execute();
        $data = $requete->fetchAll();
        return $data;
    }

    function selectNumberQuestion($connexion){ //select le nombre de questions
        $requete = $connexion->prepare('SELECT count(*) FROM `question`');
        $requete->execute();
        $data = $requete->fetchAll();
        return $data[0][0];
    }

    function ifAllQuestionsAnswered($data,$connexion){ //renvoie true si toutes les questions sont répondu sinon false
        $ok=FALSE;
        $nbQuestions = (int)selectNumberQuestion($connexion);
        if(count($_POST)==$nbQuestions){
            $ok=TRUE;
        }
        return $ok;
    }

    function selectLastSonde($connexion){ //selct les infos du dernier sonde
        $requete = $connexion->prepare('SELECT * FROM sonde ORDER BY IDSONDE DESC LIMIT 1');
        $requete->execute();
        $data = $requete->fetchAll();
        return $data[0];
    }

    function selectScoreFerme($IDQUESTION,$connexion){ //select les infos pour une question fermée
        $requete = $connexion->prepare('SELECT scorefres,scorefdev FROM `question` inner join scorefermee on question.IDSCOREFERMEE = scorefermee.IDSCOREF WHERE IDQUESTION=:idquestion');
        $requete->bindValue(':idquestion', $IDQUESTION, PDO::PARAM_INT);
        $requete->execute();
        $data = $requete->fetchAll();
        return $data[0];
    }


    function selectScoreEchelle($IDQUESTION,$connexion){ //select les infos pour une question échelle
        $requete = $connexion->prepare('SELECT NBPTMULTRES, NBPTMULTDEV FROM question INNER JOIN scorech ON question.IDSCORECH = scorech.IDSCORECH WHERE IDQUESTION=:idquestion');
        $requete->bindValue(':idquestion', $IDQUESTION, PDO::PARAM_INT);
        $requete->execute();
        $data = $requete->fetchAll();
        return $data[0];
    }

    function ifAccountExist($id,$p,$connexion){ //renvoie true si un compte(identifiant et mdp) existe sinon false
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

    function selectRepQuestion($IDQUESTION,$connexion){ //select la donnée 'rep' de la question donnée en paramètre
        $requete = $connexion->prepare('SELECT rep FROM `question` inner join scorefermee on question.IDSCOREFERMEE = scorefermee.IDSCOREF WHERE IDQUESTION=:idquestion');
        $requete->bindValue(':idquestion', $IDQUESTION, PDO::PARAM_INT);
        $requete->execute();
        $data = $requete->fetchAll();
        return $data[0][0];
    }

    function insertIntoReponseAssociee($idquestion,$idsonde,$valeurRes,$valeurDev,$connexion){ //insert une réponse avec toutes les infos
        $requete = $connexion->prepare("INSERT INTO `reponseassociee`(`IDQUESTION`, `IDSONDE`, `VALEURRES`, `VALEURRDEV`) VALUES (:idquestion,:idsonde,:valeurRes,:valeurDev)");
        $requete->bindValue(':idquestion', $idquestion, PDO::PARAM_INT);
        $requete->bindValue(':idsonde', $idsonde, PDO::PARAM_INT);
        $requete->bindValue(':valeurRes', $valeurRes, PDO::PARAM_INT);
        $requete->bindValue(':valeurDev', $valeurDev, PDO::PARAM_INT);
        $requete->execute();
    }

    function resultataff($connexion){ //calcul le nombre de point

        $reseau = 0;
        $reseauplus = 0;
        $reseaumoins = 0;
        $dev = 0;
        $devplus = 0;
        $devmoins = 0;
        $resultat = [];
        $requete = $connexion->prepare("SELECT VALEURRES, VALEURRDEV FROM reponseassociee WHERE IDSONDE = (SELECT MAX(IDSONDE) FROM reponseassociee) ");
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
?>