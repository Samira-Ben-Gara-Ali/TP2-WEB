<?php
include_once 'autoload.php';
$bd = ConnexionBD::getInstance();
$request = "select * from student";
$response = $bd->query($request);
$students = $response->fetchAll(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Students</title>
  <link href="node_modules/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
  <link href="node_modules/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

</head>
<body>
<table class="table">
  <thead>
    <tr>
    
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Birthday</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($students as $student) { ?>
  <tr>
    <td><?= $student->id ?></td>
    <td><?= $student->name ?></td>
    <td><?= $student->birthday ?></td>
    <td>
        <a href="detailEtudiant.php?id=<?= $student->id ?>" class="btn btn-outline-primary btn-sm">
          <i class="bi bi-info-circle"></i>
        </a>
    </td>
    
  </tr>
<?php } ?>
  </tbody>
</table>

</body>
</html>

