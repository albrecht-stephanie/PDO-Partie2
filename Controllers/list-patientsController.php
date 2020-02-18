<?php
require_once '../Models/Patient.php';
$patient = new Patient();
$usersList = $patient->getAll();
require_once '../Views/list-patients.php';
