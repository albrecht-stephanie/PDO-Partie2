<?php
require 'params.php';
$db = connectDb();
// variable pour afficher les données souhaité d'une table
$sql  = 'SELECT `id`, `lastname`, `firstname`, DATE_FORMAT(`appointments`.`dateHour`, "%d.%m.%Y %H:%i") AS dateHour FROM `patients` JOIN `appointments` ON `patients`.`id` = `appointments`.`idPatients`';
// Envoie de la requête vers la base de données
$sth = $db->query($sql);
$appointmentsList = [];
if ($sth instanceOf PDOStatement) {
  // Collection des données dans un tableau associatif (FETCH_ASSOC)
  $appointmentsList = $sth->fetchAll(PDO::FETCH_OBJ);
}

?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Clinique Montaigu - Liste des rendez-vous</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" media="screen" type="text/css" title="Mon style" href="assets/css/style.css"/>   
    </head>
    <body>   
        <div class="container">
            <div class="row">
                <div class="card col-sm-12 bg-light">
                    <div class="card-header font-bold bg-info"><h1>Clinique Montaigu</h1></div>
                    <h2>Liste des rendez-vous</h2>
                    <table class="table table-bordered">
                    <thead>
                            <tr>
                            <th>0</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Date de rendez-vous</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        if (count($appointmentsList) > 0) {
                        foreach ($appointmentsList AS $key => $appointment){
                        ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $appointment->lastname ?></a></td>
                            <td><?= $appointment->firstname ?></td>
                            <td><?= $appointment->dateHour ?></td>
                        </tr>
                        <?php
                        }
                    }
                        ?>
                    </tbody>
                        </table>
                    </table>
                    <div class="btn  btn-warning col-sm-5"><a href="ajout-rendezvous.php" title="Ajouter un rendez-vous">Ajouter un rendez-vous</a></div>
                    <div class="btn  btn-black col-sm-5"><a href="inndex.php" title="Accueil">Accueil</a></div>
                </div>
            </div>
        </div>
    </body>
</html>