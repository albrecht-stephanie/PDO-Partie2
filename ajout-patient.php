<?php
include 'form-validation.php';
if ($isSubmitted && count($errors) == 0) {
require 'params.php';
$db = connectDb();
$db->exec("SET CHARACTER SET utf8");
$query = "INSERT INTO `patients` (`lastname`, `firstname`, `birthdate`, `phone`, `mail`) VALUE (:lastname, :firstname, :birthdate, :phone, :mail)"or die ('Erreur SQL !'.$req.' '.mysql_error());
$sth = $db->prepare($query);
$sth->bindValue('lastname', $lastname, PDO::PARAM_STR);
$sth->bindValue('firstname', $firstname, PDO::PARAM_STR);
$sth->bindValue('birthdate', $birthdate, PDO::PARAM_STR);
$sth->bindValue('phone', $phone, PDO::PARAM_STR);
$sth->bindValue('mail', $mail, PDO::PARAM_STR);

$execute = $sth->execute();
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Clinique Montaigu - Ajout patient</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" media="screen" type="text/css" title="Mon style" href="assets/css/style.css" />
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="card col-sm-10 offset-2 bg-light">
                <div class="card-header font-weight-bold bg-info">
                    <h1>Ajout d'un patient</h1>
                </div>
                <form method="post" action="#">

                    <label for="birthdate"> Date de Naissance:</label>
                    <input type="date" id="birthdate" name="birthdate" value="<?= $birthdate ?>">
                    <span class="text-danger"><?= ($errors['birthdate']) ?? '' ?></span>
            </div>
            <div class="contact mb-2">
                <label for="phone"> Numéro de téléphone:</label>
                <input type="text" id="phone" name="phone" value="<?= $phone ?>">
                <span class="text-danger"><?= ($errors['phone']) ?? '' ?></span>
                <label for="mail"> Mail:</label>
                <input type="mail" id="mail" name="mail" value="<?= $mail ?>">
                <span class="text-danger"><?= ($errors['mail']) ?? '' ?></span>
            </div>
            <div class="button col-sm-5 offset-3 mb-2">
                <input class=" btn btn-info" type="submit" value="Ajout d'un patient">
                <a class="btn btn-dark" href="index.php">Accueil</a>
            </div>
            </form>
        </div>
    </div>
    </div>
</body>

</html>