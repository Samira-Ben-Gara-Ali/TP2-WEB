<?php
include_once "Etudiant.php";
$etudiants = [
    new Etudiant("Aymen", [11, 13, 18, 7, 10, 13, 2, 5, 1]),
    new Etudiant("Skander", [15, 9, 8, 16])
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resultats Etudiants</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
<div class="container">
  <div class="row">
    <?php foreach ($etudiants as $etudiant){ ?>
      <div class="col-md-4">
        <div class="card mb-4 shadow-sm">
          <div class="card-header bg-primary-subtle text-dark">
            <h5 class="card-title"><?= $etudiant->nom ?></h5>
          </div>
          <div class="card-body">
            
            <?php foreach ($etudiant->notes as $note){ 
              
              if ($note < 10) {
                $color = 'bg-danger-subtle text-dark';
            } elseif ($note > 10) {
                $color = 'bg-success-subtle text-dark';
            } else {
                $color = 'bg-warning-subtle text-dark';
            }
            
              ?>
              <div class="p-2 mb-1 rounded <?= $color ?>"><?= $note ?></div>
            <?php } ?>

            <p class="mt-3 alert alert-info">Moyenne : <?= $etudiant->calculMoyenne() ?></p>

            <?php
              $admis = $etudiant->estAdmis();
              $classAdmis = ($admis === 'Admis') ? 'text-success' : 'text-danger';
            ?>
            <p class="<?= $classAdmis ?>">
              <?= $admis ?>
            </p>

          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</div>


</body>
</html>