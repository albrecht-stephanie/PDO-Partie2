<?php
require 'params.php';
$regexdateHour = '/^(\d{2})\.(\d{2})\.(\d{4})\s(\d{2}:\d{2})$/';
$db = connectDb();
$db->exec("SET CHARACTER SET utf8");
$sql  = 'SELECT `id`, `lastname`, `firstname` FROM `patients` ORDER BY `lastname` ASC'; 
$sth = $db->query($sql);
$patientsList = $sth->fetchAll(PDO::FETCH_OBJ);
$errors = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(!empty($_POST['dateHour']) && preg_match($regexdateHour, $_POST['dateHour'])){
        $dateHour = preg_replace($regexdateHour, '$3-$2-$1 $4', $_POST['dateHour']);
    } else{
        $errors['dateHour'] = 'Veuillez renseigner une date de rendez-vous valide';
    } 
    if(!empty($_POST['patient']) && filter_input(INPUT_POST, 'patient', FILTER_VALIDATE_INT)){
        $idPatient = (int) $_POST['patient'];
    }
    else{
        $errors['patient'] = 'Veuillez choisir un patient de la liste';
    }
    if (count($errors) == 0) {
        $query = 'INSERT INTO `appointments` (`dateHour`, `idPatients`) VALUE (:dateHour, :idPatient)';
        $sth = $db->prepare($query);
        $sth->bindValue('idPatient', $idPatient, PDO::PARAM_INT);
        $sth->bindValue('dateHour', $dateHour, PDO::PARAM_STR);
        if($sth->execute()){
            $success = true;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Clinique Montaigu - Ajout de rendez vous</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" media="screen" type="text/css" title="Mon style" href="assets/css/style.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.datetimepicker.css">
</head>

<body>
    <div class="container">
        <?php if(isset($success)): ?>
        <div class="alert alert-success alert-dismissable" role="alert">
            <p>Le rendez-vous a été créé avec succès !</p>
        </div>
        <?php endif; ?>
        <div class="row">
            <div class="card col-sm-7 offset-2 bg-light">
                <div class="card-header font-weight-bold bg-info">
                    <h1>Ajout de rendez vous</h1>
                </div>
                <form method="post" action="#">
                    <p> Veuillez remplir les champs </p>
                    <div class="identity">
                        <select name="patient">
                            <?php foreach($patientsList AS $patient){?>
                            <option value="<?= $patient->id ?>"><?= $patient->lastname. ' ' .$patient->firstname ?>
                            </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="appointment">
                        <label for="periodpicker"> Date et heure du rendez-vous: </label>
                        <input id="periodpicker" name="dateHour" type="text" />
                    </div>
                    <div class="button col-10 offset-2 mb-3 mt-3">
                        <input class=" btn btn-warning " type="submit" value="Ajouter un rendez-vous">
                        <a class="btn btn-success" href="liste-rendezvous.php">Liste des rendez-vous</a>
                        <a class="btn btn-dark" href="index.php">Accueil</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/jquery.datetimepicker.full.js"></script>
    <script>
        var min_date = new Date();
        jQuery.datetimepicker.setLocale('fr');
        jQuery('#periodpicker').datetimepicker({
            format: 'd.m.Y H:i',
            minDate: min_date,
            inline: false,
            lang: 'fr'
        });
    </script>
</body>

</html>