<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="css/dashboard.css">
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
                    <tbody class="d-flex flex-row">
                        <tr class="d-flex flex-column">
                            <?php
                                $dataQuestion=getAllQuestions($connexion);
                                foreach($dataQuestion as $value){
                                    ?>
                                    <td class="border border-dark"><?php echo($value[0]);?></td>
                                    <?php
                                }
                            ?>
                        </tr>
                        <tr class="d-flex flex-column">
                            <?php
                                foreach($dataQuestion as $value){
                                    ?>
                                    <td class="border border-dark"><?php echo($value[1]);?></td>
                                    <?php
                                }
                            ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</body>
</html>