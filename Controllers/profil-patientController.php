<?php
require_once '../Models/Patient.php';
if(empty($_GET['idPatient']) || !filter_input(INPUT_GET, 'idPatient', FILTER_VALIDATE_INT)){
    header ('location: list_patientsController.php');
    exit();
}
$patient = new Patient();
$patient->id = filter_input(INPUT_GET, 'idPatient', FILTER_SANITIZE_NUMBER_INT);
if (!$patient->getOneById()){
    echo 'Ce patient n\'existe pas';
    $sleep = 5;
  header('Refresh:'. $sleep .';http://pdo/partie2/Controllers/list-patientsController.php');
}
require_once '../Views/profil-patient.php';