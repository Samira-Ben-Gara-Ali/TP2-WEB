<?php
include_once 'autoload.php';

$id = $_GET['id'];
if (!isset($id)) {
    header('Location: ex4.php');
}
$bd = ConnexionBD::getInstance();
$request = "select * from student where id = ?";
$response = $bd->prepare($request);
$response->execute([$id]);
$student = $response->fetch(PDO::FETCH_OBJ);

if (!$student) {
    header('Location: ex4.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Etudiant</title>
  <link href="node_modules/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
</head>
<body>
<div class="card p-4 mb-4 bg-white" style="max-width: 400px;">
  <h2 class="h4 text-primary">
    <?= $student->name ?> &gt;
  </h2>
  <p class="text-secondary mb-1">
    <?= $student->filiere  ?>
  </p>
  <p class="text-muted">
    <?= $student->birthday ?>
  </p>
</div>
</body>
</html>