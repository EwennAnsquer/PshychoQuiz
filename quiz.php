<<<<<<< HEAD
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/quiz.css">
</head>
<body class="d-flex align-items-center justify-content-center">
    <?php
        require_once('front-end/navbar.php');
        require_once('back-end/functions.php');
    ?>

    <main>
        <form action="" method="post">
            <table>
                <tr class="d-flex flex-column">
                    <?php
                        $data=getAllQuestions($connexion);
                        foreach($data as $value){
                            ?>
                            <td class="border border-dark"><?php echo($value[0]." ".$value[1]);?></td>
                            <?php
                        }
                    ?>
                </tr>
                <tr>

                </tr>
            </table>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </main>
</body>
=======
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
>>>>>>> c4982856a7e30408a2b39035a9fd2298a29b3217
</html>