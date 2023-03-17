<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content=" width=device-width initial-scale=1, zoomshrink-to-fit=no" />
    <title>Resultat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="assets/css/resultat.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/quiz.css">

</head>
<body>
    <?php
        require_once('back-end/functions.php');
        $resultat = resultataff($connexion); //calcul les résulats
        $_SESSION["TotalPoints"]=[$resultat[1],$resultat[4]];
        require_once('admin/front-end/admin_nav.php');
    ?>
    <main class="d-flex flex-column align-items-center justify-content-between">
        <h3>Calcul des points</h3>

        <table id = "tableau">
            <tr>
                <th colspan = "3">Dev</th>
                <th colspan = "3">Réseau</th>
            </tr>
            <tr>
                <td >Total</td>
                <td >+</td>
                <td>-</td>
                <td>Total</td>
                <td>+</td>
                <td>-</td>
            </tr> 
            <tr>
                <td><?php echo $resultat[1] ?></td>
                <td><?php echo $resultat[2] ?></td>
                <td><?php echo $resultat[3] ?></td>
                <td><?php echo $resultat[4] ?></td>
                <td><?php echo $resultat[5] ?></td>
                <td><?php echo $resultat[6] ?></td>
            </tr>
        </table>

        <h1 id = "profil" class="mt-3">Votre Profil:</h1>

        <?php
            if($resultat[0] == 1){
        ?>
        <section>
            <h4 id = "resultatstexte">Totally dév : entre 100 + et 20 ++</h4>
            <img src="assets/image/dev.jfif" alt="dev" >
            <p> 
                Un.e vrai SLAMiste. Inventez votre petit monde en c#, tout en étant, attirer par le Python qui sommeille au fond de votre disque dur. Vous danseriez tout aussi bien sur un air de Java pour développer votre site web. Vous pourriez passer des nuits à coder et ne compter pas vos heures pour débusquer le bug, le moindre indice et le temps glisse sur vous. 
                En équipe, c’est toujours plus agile. Votre patience est légendaire derrière votre écran, difficile de vous en extraire. Bon, quelquefois, votre code est sur un autre domaine que l’informatique : le commerce, la gestion des emplois du temps,… 
                Face à des utilisateurs un peu hackers ou pas dégourdis, vous pouvez être perfectionniste pour éviter les bugs de saisie. Et avec, tout cela, vous avez encore le temps de voir les nouveautés qui pourraient améliorer votre pratique.
            </p>
        </section>
        <?php 
            }
        ?>

        <?php
            if($resultat[0] == 2){
        ?>
        <section>
            <h4 id = "resultatstexte" > Mi dev mi réseau  20+ en dev et 20+ en réseau</h4>
            <img src="assets/image/mi dev mi reso.jfif" alt="dev" >
            <p>
                Vous bricolez un peu de code pour des bots de jeu ou dépanner la famille.  Vous êtes essayé.e à HTML et CSS parce que c’est marrant de voir rapidement le résultat de son code mais, pour vos jeux préférés, vous pouvez réfléchir à la meilleure manière d’exploiter votre PC.
                Un vrai technophile : vous avalez toutes les innovations techniques. Un peu branleur, try Hardeur, vous pouvez vous énerver facilement et vous aimez bien mener votre monde par le bout du nez. Votre idée : c’est aussi de choisir l’option où on bosse le moins tout en étant les rois du monde.
                Le choix sera dur en décembre !!
            </p>
        </section>
        <?php 
            }
        ?>

        <?php
            if($resultat[0] == 3){
        ?>
        <section>
            <h4 id = "resultatstexte" >Full réseau entre 100+ et 20+</h4>
            <img src="assets/image/reso.jfif" alt="dev" >
            <p>
            Full réseau entre 100+ et 20+
            Vous vous penchez non pas vers le côté obscur, mais bien vers l’option SISR !
            Ne supportant pas de perdre votre temps et étant plutôt impatient votre désir de compléter tous vos services avec directement les bonnes commandes, c’est cela votre atout.
            Être à l’aise avec différents systèmes d’exploitation et savoir dépanner vos proches quand ils sont au bout de leurs vies lorsque le WIFI est désactivé.
            Voulant non pas rester toute votre journée derrière votre écran à taper sur votre clavier, vous aimez divaguer un peu partout et surveiller le bon fonctionnement de vos créations.
            Vous aimez répondre à des demandes de dépannage et venir les résoudre pour le plaisir de l’autre
            </p>
        </section>
        <?php 
            }
        ?>
    </main>
</body>