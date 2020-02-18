<?php
require_once 'includes/header.php';
?>
<div class="row">
    <div class="card col-sm-10 offset-2 bg-light">
        <div class="card-header font-weight-bold bg-info">
            <h1>Mofier une fiche patient</h1>
        </div>
        <form method="post" action="#">
            <div class="form-group col">
                <label for="lastName">Nom</label>
                <input name="lastname" type="text" id="lastName" class="form-control" placeholder="" value="<?= $patient->lastname ?>">
                <span class="invalid-feedback"><?= ($errors['lastname']) ?? '' ?></span>
            </div>
            <div class="form-group col">
                <label for="firstName">Prénom</label>
                <input name="firstname" type="text" id="firstName" class="form-control" placeholder="" value="<?= $patient->firstname ?>">
                <span class="invalid-feedback"><?= ($errors['firstname']) ?? '' ?></span>
            </div>
            <div class="form-group col">
                <label for="birthdate"> Date de Naissance:</label>
                <input name="birthdate" type="text" id="birthdate" class="form-control" value="<?= $patient->birthdate ?>">
                <span class="text-danger"><?= ($errors['birthdate']) ?? '' ?></span>
            </div>
            <div class="contact mb-2">
                <label for="phone"> Numéro de téléphone:</label>
                <input type="text" id="phone" name="phone" value="<?= $patient->phone ?>">
                <span class="text-danger"><?= ($errors['phone']) ?? '' ?></span>
                <label for="mail"> Mail:</label>
                <input type="email" id="mail" name="mail" value="<?= $patient->mail ?>">
            </div>
            <div>
                <ul class="list-group text-center">
                    <li class="list-group-item"><span class="font-weight-bold"></span><?= ($appointment->dateHour) ?? 'Pas de rendez-vous' ?></li>
                </ul>
            </div>
               <button type="submit" class="btn btn-outline-primary float-right mt-4">Envoyer les modifications</button>
        </form>
    </div>   
</div>

<?php
require_once 'includes/footer.php';
?>
