<?php
//les paramètres de connexion a la base de donnée//
$machine='localhost';
$utilisateur='root';
$motdepasse='';
$nomdebase="quizz";
//creation de la connexion et activation des avertissements en cas d’erreur/
$connexion=new PDO('mysql:host='.$machine.';dbname='.$nomdebase, $utilisateur,$motdepasse);
$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

?>