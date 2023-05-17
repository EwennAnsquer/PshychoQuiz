<?php
require_once('front-end/navbar.php');
require_once('back-end/functions.php');
$profils_aff= reqadminprofils($connexion)
?>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content=" width=device-width initial-scale=1, zoom shrink-to-fit=no" />
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
	<script src = "admin/script/profilsadmin.js"></script>
    <link rel="stylesheet" href="assets/css/profils-admin.css">
	<link rel="stylesheet" href="assets/css/style.css">
    
</head>
<body>
	<h1 id = "pro">PROFILS</h1>
	<br>
	<br>
		<?php
if (!empty($profils_aff)) {
    ?><table>
        <tr>
            <th>NOM</th>
            <th>ID</th>
			<th>IDORIGINE</th>
            <th>ANNEE</th>
            <th>SEXE</th>
        </tr>
        <?php
        foreach ($profils_aff as $p) {
            ?>
            <tr>
                <td><?php echo $p['NOM'] ?></td>
                <td><?php echo $p['ID'] ?></td>
				<td><?php echo $p['IDORIGINE'] ?></td>
                <td><?php echo $p['ANNEE'] ?></td>
                <td><?php echo $p['SEXE'] ?></td>
				<td><button class="bouttontab" data-action="modifier" data-id="<?php echo $p['ID'] ?>">modifier</button></td>
                <td><button class="bouttontab" data-action="supprimer" data-id="<?php echo $p['ID'] ?>">supprimer</button></td>
        </td>
            <?php
        }
        ?>
    </table>
    <?php
} 
else {
	?>
		<p>Il n'y a aucun utilisateur dans la base de données</p>
   <?php
}
?>


</html>
</body>