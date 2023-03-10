<?php
require_once('back-end/functions.php');
$id = $_POST['id'];
supprimer_profil($connexion, $id);
?>