<?php
require_once 'includes/header.php';
?>
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
                    <th>Profil</th>
                    <th>supprimer</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (count($usersList) > 0) {
                    foreach ($usersList as $patientId => $patient){
                        ?>
                        <tr>
                            <td><?= $patientId + 1 ?></td>
                            <td><?= $patient['lastname'] ?></td>
                            <td><?= $patient['firstname'] ?></td>
                            <td><a href="../Controllers/profil-patientController.php?idPatient=<?= $patient['id'] ?>"class="btn btn-sm btn-primary" >Modifier</a></td>
                            <td><button data-id="<?= $patient['id'] ?>" class="deleteButton btn btn-sm btn-danger" data-toggle="modal" data-target="#confirmDeleteModal">Supprimer</button></td>
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
<?php
require_once 'includes/footer.php';
?>
