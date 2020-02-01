<?php
$lastname ='';
$firstname ='';
$birthdate ='';
$phone ='';
$mail ='';

    function connectDb() {
        require_once 'params.php';

        $dsn = 'mysql:dbname=' . DB . ';host=' . HOST;

        try {
            $db = new PDO($dsn, USER, PASSWD);
            return $db;
        } catch (Exception $ex) {
            die('La connexion à la bdd a échoué !');
        }
        $Ajoutpatient= "INSERT TO `patients` (lastname, firstname, birthdate, phone, mail) VALUE ('$lastname', '$firstname', '$birthdate', '$phone', '$mail')";
   
    }
     ?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Ex1</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>   
        <div class="container">
            <div class="row">
                <div class="card col-sm-6 offset-2 bg-light">
                    <div class="card-header font-weight-bold bg-info"><h1>Ajout d'un patient</div>
                        <?php
                        if (!empty($_POST['lastname']) && !empty($_POST['firstname'])) {?>
                            <p><?= 'Le patient '. htmlspecialchars($_POST['lastname']) . ' ' . htmlspecialchars($_POST['firstname']) . ' a bien étén ajouté'?></p>
                        <?php } else { ?>
                            <form method="post" action="#">
                                <p> Veuillez remplir les champs </p>
                                <div class="lastname">
                                    <label for="lastname"> Nom: </label>
                                    <input type="text" id="lastname" name="lastname" placeholder="Nom">
                                </div>
                                <div class="fistname">
                                    <label for="firstName"> Prénom: </label>
                                    <input type="text" id="firstname" name="firstname" placeholder="Prénom">
                                </div>
                                <div class="birthDate">
                                    <label for="birthDate"> Date de Naissance:</label>
                                    <input type="date" id="birthDate" name="birthDate">
                                </div>
                                <div class="phone">
                                    <label for="phone"> Numéro de téléphone:</label>
                                    <input type="text" id="phone" name="phone">
                                </div>
                                <div class="mail">
                                    <label for="mail"> Mail:</label>
                                    <input type="mail" id="mail" name="mail">
                                </div>
                                <div class="button btn btn-info">
                                    <input type="submit" value="Valider">
                                </div>
                            </form> 
                        <?php } ?>
                    </div>
                </div>
            </div>
        

