
<?php
require 'params.php';
$db = connectDb();
// variable pour afficher les données souhaité d'une table
$sql = 'SELECT `id`, `lastname`, `firstname`, `birthdate`, `phone`, `mail` FROM `patients` LIMIT 50';
// Envoie de la requête vers la base de données
$usersQueryStat = $db->query($sql);
$usersList = [];
if ($usersQueryStat instanceOf PDOStatement) {
  // Collection des données dans un tableau associatif (FETCH_ASSOC)
  $usersList = $usersQueryStat->fetchAll(PDO::FETCH_ASSOC);
}
?><!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Clinique Montaigu - Liste des patients</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" media="screen" type="text/css" title="Mon style" href="assets/css/style.css"/>   
    </head>
    <body>   
        <div class="container">
            <div class="row">
                <div class="card col-sm-12 bg-light">
                    <div class="card-header font-bold bg-info"><h1>Clinique Montaigu</h1></div>
                    <h2>Liste des patients</h2>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th>0</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Date d'anniversaire</th>
                            <th>Télephone</th>
                            <th>Email</th>
                            <th>Informations</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        if (count($usersList) > 0) {
                        foreach ($usersList AS $key => $user){
                        ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><a href="profil-patient.php?idPatient=<?= $user['id'] ?>"><?= $user['lastname'] ?></a></td>
                            <td><?= $user['firstname']?></td>
                            <td><?= $user['birthdate']?></td>
                            <td><?= $user['phone']?></td>
                            <td><?= $user['mail']?></td>
                            <td><a href="http://pdo/partie2/profil-patient.php">page profil</a></td>
                        </tr>
                        <?php
                        }
                    }
                        ?>
                    </tbody>
                        </table>
                        <a class="btn btn-warning" href="ajout-patient.php">Créer un patient</a>
                        <a class="btn btn-dark" href="index.php">Accueil</a>
                    </div>
                </div>
            </div>